@extends('layouts.main')

@section('content')

<h1 class="h2">Jogos da Temporara {{$season->name}}</h1>

<a class="btn btn-primary my-4 mr-2" href="{{route('seasons.index')}}">Voltar</a>
<a class="btn btn-primary my-4" href="/games/{{$season->id}}/create">Adicionar Novo Jogo</a>

<table class="table">
    <thead>
        <tr>
            <th>Jogo</th>
            <th>Pontuação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
            <tr>
                <td>{{$game->id}}</td>
                <td>{{$game->score}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection