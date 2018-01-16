@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $postnotice)
    <h1>{{$postnotice->title}}</h1>
    <p>{{$postnotice->description}}</p><br>
    <b>Author: {{$postnotice->user->name}}</b>
    <a href="{{url("/notice/$postnotice->id/update")}}">Editar</a>
    <hr>
    @empty
        <p>Nenhum Post Cadastrado</p>
    @endforelse    
</div>
@endsection
