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
            <p class="event-participants"><ion-icon name="people"></ion-icon> {{ count($campanha->users) }} Participante(s)</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
            <form action="/events/join/{{ $campanha->id }}" method="POSt">
                @csrf
                <a href="/events/join/{{ $campanha->id }}" 
                class="btn btn-primary"
                id="event-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Participar
                </a>
            </form>
            <h3>A campanha conta com:</h3>
            <ul id="items-list">
                @foreach($campanha->items as $item)
                    <li><ion-icon name="arrow-dropright"></ion-icon><span>{{ $item }} </span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3><ion-icon name="paper"></ion-icon> Enredo da campanha:</h3>
            <p class="event-description">{{ $campanha->description }}</p>
        </div>
    </div>
</div>

@endsection