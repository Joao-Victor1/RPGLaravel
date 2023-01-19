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
            <p class="event-local"><ion-icon name="phone-portrait">{{ $campanha->location }}</ion-icon></p>
        </div>
    </div>
</div>

@endsection