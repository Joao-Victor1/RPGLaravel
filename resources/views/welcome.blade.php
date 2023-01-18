@extends('layouts.main')
@section('title', 'RPG Finder')


@section('content')

<div id="search-container" class="col-md-12">
    <h1> Procure sua campanha ideal </h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
    </form>
</div>
<div id="campanhas-container" class="col-md-12">
    <h2>Próximas Campanhas</h2>
    <p class="subtitle">Veja as campanhas dos próximos dias:</p>

    <div id="cards-container" class="row">
        @foreach($campanhas as $campanha)
        <div class="card col-md-3">
            <img src="/img/tabletopBanner.jpg" alt="{{ $campanha->title }}">
            <div class="card-body">
                <p class="card-date">10/02/2023</p>
                <h5 class="card-title">{{ $campanha->title }}</h5 >
                <p class="card-participants">X Participantes</p>
                <a href="#" class="btn btn-primary">Saber mais </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection 