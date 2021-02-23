<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show ($nombre_archivo){

    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);//ESTA PARTE PERMITE SABER LA EXTENSION DEL ARCHIVO

    if($extension=="xml") {    
    $file_path_xml = public_path('archivos/xml/2021/'.$nombre_archivo);
    return response()->download($file_path_xml);
	}
	else if($extension=="pdf") {    
    $file_path_pdf = public_path('archivos/pdf/2021/'.$nombre_archivo);
    return response()->download($file_path_pdf);
	}

    }
}
