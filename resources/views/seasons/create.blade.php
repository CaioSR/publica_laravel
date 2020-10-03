@extends('layouts.main')

@section('content')
  
<h1 class="h2">Nova Temporada</h1>

<a class="btn btn-primary my-4" href="#">Voltar</a>

<form action="{{route('seasons.store')}}" method="post">
    @csrf

    <label for="name">Nome</label><br>
    <input class="form-control" type="text" name="name" id="name" placeholder="Verão 2020"><br>

    <input class="btn btn-primary" type="submit" value="Cadastrar">
</form>
  
@endsection




