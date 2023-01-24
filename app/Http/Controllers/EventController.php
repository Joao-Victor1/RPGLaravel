<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
        
        $search = request('search');

        if($search){
            $campanhas = Campanha::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        }else{
            $campanhas = Campanha::all();
        }

        return view('index', ['campanhas' => $campanhas, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        
        $campanha = new Campanha;
        $campanha->title = $request->title;
        $campanha->location = $request->local;
        $campanha->system = $request->system;
        $campanha->date = $request->date;
        $campanha->private = $request->private;
        $campanha->description = $request->description;
        $campanha->items = $request->items;

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

        $user = auth()->user();
        $campanha->user_id = $user->id;

        $campanha->save();

        return redirect('/')->with('msg', "Campanha criada com sucesso!!");
    }

    public function show($id){

        $campanha = Campanha::findOrFail($id);
        $eventOwner = User::where('id', $campanha->user_id)->first()->toArray();

        return view('events.show', compact('campanha', 'eventOwner')); 
    }

    public function dashboard(){

        $user = auth()->user();
        $campanhas = $user->campanhas;

        return view('events.dashboard', compact('campanhas'));
        
    }
}

