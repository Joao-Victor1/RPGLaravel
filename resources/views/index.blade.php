@extends('layouts.main')
@section('title', 'RPG Finder')


@section('content')

<div id="search-container" class="col-md-12">
    <h1><ion-icon name="search"></ion-icon> Procure sua campanha ideal! </h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
    </form>
</div>
<div id="campanhas-container" class="col-md-12">
    <h2><ion-icon name="calendar"></ion-icon>Próximas Campanhas</h2>  
    <p class="subtitle">Veja as campanhas dos próximos dias:</p>

    <div id="cards-container" class="row">
        @foreach($campanhas as $campanha)
        <div class="card col-md-3">
            <img src="/img/events/{{ $campanha->image }}" alt="{{ $campanha->title }}">
            <div class="card-body">
                <p class="card-date">10/02/2023</p>
                <h5 class="card-title">{{ $campanha->title }}</h5 >
                <p class="card-participants">X Participantes</p>
                <a href="/events/{{ $campanha->id }}" class="btn btn-primary">Saber mais </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection 