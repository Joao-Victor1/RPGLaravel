@extends('layouts.main')
@section('title', 'Criar Campanha')


@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1><ion-icon name="book"></ion-icon> Crie sua campanha</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Campanha:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da campanha" required="">
        </div>
        <div class="form-group">
            <label for="location">Local (Discord ou Roll20):</label>
            <input type="text" class="form-control" id="local" name="local" placeholder="Local da campanha" required="">
        </div>
        <div class="form-group">
            <label for="system">Sistema:</label>
            <input type="text" class="form-control" id="system" name="system" placeholder="Sistema da campanha" required="">
        </div>
        <div class="form-group">
            <label for="private">A campanha é privada ?</label>
            <select name="private" id="private" class="form-select">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enredo da campanha..." required=""></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagem da Campanha:</label>
            <input type="file" id="image" name="image" class="btn btn-sm form-control-file">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Campanha">
    </form>
</div>

@endsection