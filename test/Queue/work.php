	<?php

	include(__DIR__ . '/config.php');
    

	use PhpAmqpLib\Connection\AMQPStreamConnection;
	use PhpAmqpLib\Message\AMQPMessage;
	use Illuminate\Foundation\Helpers;
	use YoutubeDl\YoutubeDl;
	

	$connection = new AMQPStreamConnection(HOST, PORT, USER, PASS, VHOST);
	$channel = $connection->channel();

	$channel->queue_declare('Descargas', false, false, false, false);
	echo ' [x] En proceso. Para salir presiona CTRL+C', "\n";
	$callback = function($msg) {

	$dl = new YoutubeDl([
	'continue' => true, 
	'format' => 'bestvideo',
	]);

	$dl->setDownloadPath('/home/jose/Descargas');

	try {
	$cuerpo = json_decode($msg->body);
	$id = $cuerpo->id;	

	echo "Datos del video: ", var_dump($msg->body) ,"\n";
	$video = $dl->download($cuerpo->descripcion); 
	echo $video->getTitle(), "\n"; 
	echo "Se ha descargado ", $cuerpo->descripcion,"\n"; 
	echo "Se va actualizar la descarga: ", $id,"\n";
     $mysql = new mysqli("127.0.0.1", "jose", "12345", "proyecto", 3306);
     $query = "UPDATE downloads SET estado = 'descargado' WHERE id = $id;";
if ($mysql->query($query) === TRUE) {
echo "Se actualizó la descarga en la base de datos mysql ";
} 
else {
echo "Error durante la actualización : " . $mysqli->error;
}

	

	} catch (NotFoundException $e) {
	// Video no se encontró
	} catch (PrivateVideoException $e) {

	} catch (CopyrightException $e) {

	} catch (\Exception $e) {
	// Descarga no exitosa
	}
	    
	};

	//This tells RabbitMQ not to give more than 5 messages to a worker at a time.

	$channel->basic_qos(null, 5, null);
	$channel->basic_consume('Descargas', '', false, true, false, false, $callback);
	while(count($channel->callbacks)) {
	$channel->wait();
	}
	$channel->close();
	$connection->close();

