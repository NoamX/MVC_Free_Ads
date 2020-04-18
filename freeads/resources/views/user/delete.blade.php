@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <h3 class="card-title">Delete account</h3>
    </div>
    <div class="card-body">
        <form action="/profile/delete/{{ auth()->user()->id }}" method="post">
            @csrf
            <div class="alert alert-danger">
                Are you sure you want to delete your account permanently ?
                <br>
                Type your password to confirm your account deletion.
            </div>
            <hr>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <?= $error ?? '' ?>
            <button type="submit" class="btn btn-danger btn-large">Delete your account</button>
            <hr>
        </form>
        <a href="/profile"><button class="btn btn-primary">Go back to profile</button></a>
    </div>
</div>
@stop