@extends('layouts.app')
@section('content')
<div style="margin-left: 25px">
    <ul class="list-group">
        <li class="list-group-item">
            <h1>Profile</h1>
        </li>
        <li class="list-group-item">
            <p><a href="/profile/edit">Edit profile</a></p>
        </li>
        <li class="list-group-item">
            <p>{{ Auth::user()->name }}</p>
        </li>
        <li class="list-group-item">
            <p>{{ Auth::user()->email }}</p>
        </li>
    </ul>
</div>
@stop