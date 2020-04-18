@extends('layouts.app')
@section('content')
<div class="card" style="margin: 0 75px">
    <div class="card-header">
        <a href="/profile"><button class="btn btn-primary">Back</button></a>
        <hr>
        <h3 class="cart-title">Edit Profile</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="NEW NAME"><br>
            <input type="email" class="form-control" name="email" placeholder="NEW EMAIL"><br>
            <input type="password" class="form-control" name="current_password" placeholder="CURRENT PASSWORD"><br>
            <input type="password" class="form-control" name="password" placeholder="NEW PASSWORD"><br>
            <input type="password" class="form-control" name="password_confirm" placeholder="CONFIRM NEW PASSWORD"><br>
            <?= $error ?>
            <button type="sumbit" class="btn btn-primary" name="submit">Confirm</button>
        </form>
        <hr>
        <a href="/profile/delete"><button class="btn btn-danger" name="delete">Delete account</button></a>
    </div>
</div>
@stop