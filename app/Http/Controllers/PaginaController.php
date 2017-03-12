<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    
    public function inicio()
    {
        return view("index");
    }
    
    public function servicio()
    {
        return view("paginaWeb/servicios");
    }
    
    public function contacto()
    {
        return view("paginaWeb/contactenos");
    }
}
