@extends('layouts.app')
@section('content')
<div style="margin-left: 25px;" align="center">
    <h1>Edit Profile</h1>
    <form method="POST" action="" style="width: 50%">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="NEW NAME"><br>
        <input type="email" class="form-control" name="email" placeholder="NEW EMAIL"><br>
        <input type="password" class="form-control" name="password" placeholder="NEW PASSWORD"><br>
        <input type="password" class="form-control" name="password_confirm" placeholder="CONFIRM NEW PASSWORD"><br>
        <button class="btn btn-primary form-control">Confirm</button>
    </form>
</div>
@stop