<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage()
    {
        $ourName = "Bill";
        $animals = ['Mews','Barks','James'];
        return view('homepage',['allAnimals' => $animals,'name' => $ourName]);
    }

    public function about(): string
    {
        return 'Halo from about';
    }
}
