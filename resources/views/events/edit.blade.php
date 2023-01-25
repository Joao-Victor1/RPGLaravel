@extends('layouts.main')
@section('title', 'Editando: ' . $campanha->title)


@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1><ion-icon name="create"></ion-icon>Editando: {{ $campanha->title }}</h1>
    <form action="/events/update/{{ $campanha->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Campanha:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da campanha" required="" value="{{ $campanha->title }}">
        </div>
        <div class="form-group">
            <label for="location">Local (Discord ou Roll20):</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Local da campanha" required="" value="{{ $campanha->location }}">
        </div>
        <div class="form-group">
            <label for="system">Sistema:</label>
            <input type="text" class="form-control" id="system" name="system" placeholder="Sistema da campanha" required="" value="{{ $campanha->system }}">
        </div>
        <div class="form-group">
            <label for="date">Data da campanha:</label>
            <input type="date" class="form-control" id="date" name="date" required="" max="2050-12-31" value="{{ $campanha->date->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="private">A campanha é privada ?</label>
            <select name="private" id="private" class="form-select">
                <option value="0">Não</option>
                <option value="1" {{ $campanha->private == 1 ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enredo da campanha..." required="">{{ $campanha->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Especificações:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Sem especificação"> Sem especificação
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Livros de complemento"> Livros de complemento
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Livro de aventura pronta"> Livro de aventura pronta
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Grid"> Grid
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Trilha Sonora"> Trilha sonora
            </div>
        </div>
        <div class="form-group">
            <label for="image">Imagem da Campanha:</label>
            <input type="file" id="image" name="image" class="btn btn-sm form-control-file">
            <img src="/img/events/{{ $campanha->image }}" alt="{{ $campanha->title }}" class="image-preview">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Campanha">
    </form>
</div>

@endsection