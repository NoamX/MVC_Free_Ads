@extends('layouts.app')
@section('content')
<div class="col">
    <div class="card" style="margin: 0 75px">
        <div class="card-header">
            <h3 class="card-title">Create an ad</h3>
        </div>
        <div class="card-body">
            {{ Form::open([ 'url' => '/annonce/create', 'method' => 'post']) }}
            <input class="form-control" type="text" name="title" placeholder="Title" required><br>
            <input class="form-control" type="text" name="price" placeholder="Price" required><br>
            <textarea class="form-control" type="text" name="desc" placeholder="Description" style="height: 250px" required></textarea><br>
            <button class="btn btn-primary" type="submit" name="submit">Upload</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop