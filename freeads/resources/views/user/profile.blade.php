@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <a href="{{ route('edit') }}"><button class="btn btn-primary">Edit profile</button></a>
    </div>
    <div class="card-body">
        <h4 class="card-title">Name :</h4>
        <p class="card-text">{{ Auth::user()->name }}</p>
        <hr>
        <h4 class="card-title">Email :</h4>
        <p class="card-text">{{ Auth::user()->email }}</p>
        <hr>
        <h4 class="card-title">Created on :</h4>
        <p class="card-text">{{ Auth::user()->created_at }}</p>
    </div>
</div>
<div class="card" style="margin: 25px 75px">
    <div class="card-header">
        <h3>Your ad(s)</h3>
    </div>
    <div class="card-body">
        @foreach ($annonces as $annonce)
        <div class="card" style="margin: 25px">
            <div class="card-header">
                <div style="float: left">
                    <h4 class="card-title">{{ $annonce->name }}</h4>
                    <em class="card-text">{{ $annonce->date }}</em>
                </div>
                <div style="float: right">
                    <a href="{{ route('annonce.edit', $annonce->aId) }}"><button class="btn btn-primary">Edit</button></a>
                    <a href="/annonce/destroy/{{ $annonce->aId }}"><button class="btn btn-danger">Delete</button></a>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $annonce->title }}</h4>
                @if(!empty($annonce->image))
                <img src="{{ $annonce->image }}" alt="image" class="img-thumbnail" width="25%">
                @endif
                <hr>
                <p class="card-text">{{ $annonce->price }} €</p>
                <hr>
                <p class="card-text"><?= $annonce->description ?></p>
            </div>
        </div>
        @endforeach
    </div>
    <div style="width: 250px; margin: 0 auto;">{{ $annonces->links() }}</div>
</div>
@stop