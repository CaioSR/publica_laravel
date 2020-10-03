@extends('layouts.main')

@section('content')

<h1 class="h2">Temporadas</h1>

<a class="btn btn-primary my-4" href="{{route('seasons.create')}}">Cadastrar Nova Temporada</a>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Máximo da Temporada</th>
            <th>Mínimo da Temporada</th>
            <th>Quebra recorde máximo</th>
            <th>Quebra recorde mínimo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seasons as $season)
            <tr>
                <td>{{$season->name}}</td>
                <td>{{$season->maxScore}}</td>
                <td>{{$season->minScore}}</td>
                <td>{{$season->maxScoreCounter}}</td>
                <td>{{$season->minScoreCounter}}</td>
                <td class="text-center"><a href="/games/{{$season->id}}">Ver Jogos</a></td>
                <td>
                    <form action="/seasons/{{$season->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Deletar" class="form-control">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection