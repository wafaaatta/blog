<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        $elements = ['Element 1', 'Element 2', 'Element 3'];
        $title = "welcome";
        $content = "test content";
        $condition = true; 

        return view('welcome', 
        ['title'=>$title,
        'elements' => $elements,
        'condition' => $condition,
        'content'=>$content
    ]);
}
    // d'autres méthodes selon mes besoins
}