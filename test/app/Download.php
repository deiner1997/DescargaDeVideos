<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Download extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'estado', 'usuario_id',
    ];
    
    protected function showDownloads()
    {

 $usuario_id = Auth::user()->id;
 $descargas = DB::table('downloads')->where('usuario_id','=', $usuario_id)->get();

    	return $descargas;
    }

    protected function updateDownload($id)
    {

   DB::table('downloads')->where('id',  '=' , $id )->update([
'estado' => 'Descargado' ]);  
    
    }

}
