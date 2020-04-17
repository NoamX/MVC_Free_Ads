@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <h1>Edit Profile</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="NEW NAME"><br>
            <input type="email" class="form-control" name="email" placeholder="NEW EMAIL"><br>
            <input type="password" class="form-control" name="password" placeholder="NEW PASSWORD"><br>
            <input type="password" class="form-control" name="password_confirm" placeholder="CONFIRM NEW PASSWORD"><br>
            <button class="btn btn-primary" name="submit">Confirm</button>
        </form>
    </div>
</div>
@stop