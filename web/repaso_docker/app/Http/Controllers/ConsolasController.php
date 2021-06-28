<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consola;
class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = array(); // $marcas = ["Sony","Microsoft","Nintendo","Sega"];
        $marcas[] = "Sony";
        $marcas[] = "Microsoft";
        $marcas[] = "Nintendo";
        $marcas[] = "Sega";

        return $marcas;
    }
    public function getConsolas(){
        $consolas = Consola::all();
        return $consolas;
    }

    public function crearConsola(){
        $consola = new Consola();
        $consola->nombre = "Nintendo Switch";
        $consola->marca = "Nintendo";
        $consola->anio = 2015;

        $consola->save();
        return $consola;
    }

}
