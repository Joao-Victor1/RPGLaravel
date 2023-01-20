@extends('layouts.main')
@section('title', $campanha->title)


@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $campanha->image }}" class="img-fluid" alt="{{ $campanha->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $campanha->title }}</h1>
            <p class="event-local"><ion-icon name="phone-portrait"></ion-icon>{{ $campanha->location }}</p>
            <p class="event-participants"><ion-icon name="people"></ion-icon> X Participants</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Mestre</p>
            <a href="#" class="btn btn-primary" id="event-submit">Participar</a>
        </div>
        <div class="col-md-12" id="description-container">
            <h3><ion-icon name="paper"></ion-icon> Enredo da campanha:</h3>
            <p class="event-description">{{ $campanha->description }}</p>
        </div>
    </div>
</div>

@endsection