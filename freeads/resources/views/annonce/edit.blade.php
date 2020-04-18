@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <a href="/annonce"><button class="btn btn-primary">Back</button></a>
        <hr>
        <h3 class="cart-title">Edit ad</h3>
    </div>
    <div class="card-body">
        {{ Form::model($annonce, ['route'=>['annonce.update',$annonce->id], 'method'=>'PATCH']) }}
        <input type="text" class="form-control" name="title" value="{{ $annonce->title }}" required><br>
        <input type="number" step="0.01" min="0" class="form-control" name="price" value="{{ $annonce->price }}" required><br>
        <textarea class="form-control" type="text" name="desc" style="height: 250px" required><?= strip_tags($annonce->description) ?></textarea><br>
        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        {{ Form::close() }}
    </div>
</div>
@stop