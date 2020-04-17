@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <a href="/annonce/create"><button class="btn btn-primary">Create an ad</button></a>
    </div>
    @foreach ($users as $user)
    <div class="card" style="margin: 25px">
        <div class="card-header">
            <h4 class="card-title">{{ $user->name }}</h4>
            @if($user->author_id == auth()->user()->id )
            <a href=""><button class="btn btn-primary">Edit</button></a>
            <a href=""><button class="btn btn-danger">Delete</button></a>
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $user->title }}</h4>
            <em class="card-text">{{ $user->created_at }}</em>
            <hr>
            <p class="card-text">{{ $user->price }} €</p>
            <hr>
            <p class="card-text"><?= html_entity_decode($user->description) ?></p>
        </div>
    </div>
    @endforeach
</div>
@stop