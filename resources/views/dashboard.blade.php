@extends('layouts.main')
@section('title', 'Dashboard')


@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Campanhas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-campanhas-container">
    @if(count($campanhas) > 0)
    @else
    <div class="alert alert-info">
        <p>Você ainda não tem campanhas! <a href="/events/create">Crie sua campanha!!</a></p> 
    </div>
    @endif
</div>
@endsection