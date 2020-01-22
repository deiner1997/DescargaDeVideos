<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Download;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;



class DescargaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Functions.descarga');
    }

   public function createDescarga(Request $request)
    {
//Agregar la descarga a mysql
      $usuario_id = Auth::user()->id;
      $link = Input::get('descripcion');
      $estado = "Pendiente";
      //Creamos el array de las descargas
      $descargas = array('usuario_id' => $usuario_id, 
        'descripcion' => $link,
        'estado' => $estado);
       
      $id = DB::table('downloads')->insertGetId($descargas);
      
$video = array('id' => $id,
  'usuario_id' => $usuario_id, 
        'descripcion' => $link,
        'estado' => $estado);

$connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest', '/');
            $channel = $connection->channel();
           //var_dump($descargas);
            $channel->queue_declare('Descargas', false, false, false, false);
            $msg = new AMQPMessage(json_encode($video));
            $channel->basic_publish($msg, '', 'Descargas');
           
            $channel->close();
            $connection->close();
         
        return Redirect::back();
  }

   public function show()
    {       
        $descargas = Download::showDownloads();
        return view('home')->with('descargas',compact('descargas'));
    }
 public function update($id)
    {
        $descargas = Download::updateDownload($id);
   echo "Se actualizó el video con el id: ".$id;
    }

}
