@extends('layouts.main')
@section('title', 'Dashboard')


@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Campanhas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-campanhas-container">
    @if(count($campanhas) > 0)
    <table class="table table-secondary table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Participantes</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campanhas as $campanha)
                <tr>
                    <th scropt="row">{{ $loop->index + 1 }}</th>
                    <td><a href="/events/{{ $campanha->id }}">{{ $campanha->title }}</a></td>
                    <td>0</td>
                    <td>{{ date('d/m/Y', strtotime($campanha->date)) }}</td>
                    <td><a href="#" class="btn btn-outline-warning">Editar</a> <a href="#" class="btn btn-outline-danger">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <p>Você ainda não tem campanhas! <a href="/events/create">Crie sua campanha!!</a></p> 
    </div>
    @endif
</div>
@endsection