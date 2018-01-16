@extends('layouts.app')

@section('content')
<div class="container">    
    <h1>{{$postnotice->title}}</h1>
    <p>{{$postnotice->description}}</p><br>
    <b>Author: {{$postnotice->user->name}}</b>  
</div>
@endsection
