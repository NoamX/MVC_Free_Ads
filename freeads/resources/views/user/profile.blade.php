@extends('layouts.app')
@section('content')
<div style="margin: 0 75px">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('edit') }}">Edit profile</a>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Nom :</strong>
            <hr>
            {{ $user->name }}
        </li>
        <li class="list-group-item">
            <strong>Email :</strong>
            <hr>
            {{ $user->email }}
        </li>
        <li class="list-group-item">
            <strong>Créer le :</strong>
            <hr>
            {{ $user->created_at }}
        </li>
    </ul>
</div>
@stop