@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <a href="{{ route('edit') }}"><button class="btn btn-primary">Edit profile</button></a>
    </div>
    <div class="card-body">
        <h4 class="card-title">Name :</h4>
        <p class="card-text">{{ $user->name }}</p>
        <hr>
        <h4 class="card-title">Email : :</h4>
        <p class="card-text">{{ $user->email }}</p>
        <hr>
        <h4 class="card-title">Created on :</h4>
        <p class="card-text">{{ $user->created_at }}</p>
    </div>
</div>
@stop