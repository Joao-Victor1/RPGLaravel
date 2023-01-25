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
        $campanha->location = $request->location;
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

        $campanhasAsParticipants = $user->campanhasAsParticipants;

        return view('events.dashboard', compact('campanhas', 'campanhasAsParticipants'));
        
    }

    public function destroy($id){

        Campanha::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Campanha deletada com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();

        $campanha = Campanha::findOrFail($id);

        if($user->id != $campanha->user_id){
            return redirect('/dashboard'); 
        }

        return view('events.edit', compact('campanha'));
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }
        
        Campanha::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Campanha editada com sucesso!');
    }

    public function joinEvent($id){

        $user = auth()->user();
        $user->campanhasAsParticipants()->attach($id);

        $campanha = Campanha::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença foi confirmada na campanha: ' . $campanha->title);

    }

    public function leaveEvent($id){
        
        $user = auth()->user();
        $user->camoanhasAsParticipants()->detach($id);

        $campanha = Campanha::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu da campanha: ' . $campanha->title);
    }
}

