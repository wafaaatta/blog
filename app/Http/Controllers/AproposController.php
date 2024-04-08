<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AProposController extends Controller
{
    
    public function index()
    {
        $elements = ['Element 1', 'Element 2', 'Element 3'];
        $title = "Apropos";
        $content = "test content";
        $condition = true; 

        return view('Apropos', 
        ['title'=>$title,
        'elements' => $elements,
        'condition' => $condition,
        'content'=>$content
    ]);
    }



    // d'autres méthodes selon mes besoins
}

