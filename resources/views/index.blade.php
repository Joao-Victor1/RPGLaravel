@extends('layouts.main')
@section('title', 'RPG Finder')


@section('content')

<div id="search-container" class="col-md-12">
    <h1><ion-icon name="search"></ion-icon> Procure sua campanha ideal! </h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
    </form>
</div>
<div id="campanhas-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }} </h2>
    @else
    <h2><ion-icon name="calendar"></ion-icon>Próximas Campanhas</h2>
    <p class="subtitle">Veja as campanhas dos próximos dias:</p>
    @endif

    <div id="cards-container" class="row">
        @foreach($campanhas as $campanha)
        <div class="card col-md-3">
            <img src="/img/events/{{ $campanha->image }}" alt="{{ $campanha->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($campanha->date))}}</p>
                <h5 class="card-title">{{ $campanha->title }}</h5 >
                <p class="card-participants">X Participantes</p>
                <a href="/events/{{ $campanha->id }}" class="btn btn-primary">Saber mais </a>
            </div>
        </div>
        @endforeach
        @if(count($campanhas) == 0 && $search)
        <div class="alert alert-warning">
            <p>Não foi possível encontrar nenhuma campanha com {{ $search }}!! <a href="/">Ver todos</a></p>
        </div>
        @elseif(count($campanhas) == 0)
        <div class="alert alert-info">
            <p>Não há campanhas no momento...</p>
        </div>
        @endif
    </div>
</div>

@endsection 