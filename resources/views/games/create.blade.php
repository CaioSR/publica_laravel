@extends('layouts.main')

@section('content')

    <h1 class="h2">Novo Jogo</h1>

    <a class="btn btn-primary my-4" href="#">Voltar</a>
    
    <form action="/games/{{$season_id}}" method="post">
        @csrf
    
        <label for="score">Pontuação</label><br>
        <input class="form-control" type="number" name="score" id="score"><br>
    
        <input type="hidden" name="season_id" value="{{$season_id}}">
        <input class="btn btn-primary" type="submit" value="Cadastrar">
    </form>

@endsection



