<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;

class EventController extends Controller
{
    public function index(){

        $campanhas = Campanha::all();

        return view('index', ['campanhas' => $campanhas]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        
        $campanha = new Campanha;
        $campanha->title = $request->title;
        $campanha->location = $request->local;
        $campanha->system = $request->system;
        $campanha->private = $request->private;
        $campanha->description = $request->description;

        //Image Upload:
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $campanha->image = $imageName;

            
        }else{
            $campanha->image = 'tabletopBanner.jpg'; 
        }

        $campanha->save();

        return redirect('/')->with('msg', "Campanha criada com sucesso!!");
    }

    public function show($id){

        $campanha = Campanha::findOrFail($id);
        return view('events.show', ['event' => $campanha]);
    }
}

