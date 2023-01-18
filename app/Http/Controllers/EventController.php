<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;

class EventController extends Controller
{
    public function index(){

        $campanhas = Campanha::all();

        return view('welcome', ['campanhas' => $campanhas]);
    }

    public function create(){
        return view('events.create');
    }
}
