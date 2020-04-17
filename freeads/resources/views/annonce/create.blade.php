@extends('layouts.app')
@section('content')
<div class="col">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer une annonce</h3>
        </div>
        <div class="card-body">
            {{ Form::open([ 'url' => '/annonce/create', 'method' => 'post']) }}
            <input class="form-control" type="text" name="title" placeholder="Titre"><br>
            <input class="form-control" type="text" name="price" placeholder="Prix"><br>
            <textarea class="form-control" type="text" name="desc" placeholder="Description de l'annonce" style="height: 250px"></textarea><br>
            <button class="btn btn-primary" type="submit" name="submit">Upload</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop