@extends('layouts.app')
@section('content')
<div class="col">
    <div class="card" style="margin: 0 75px">
        <div class="card-header">
            <a href="{{ route('annonce.index') }}"><button class="btn btn-primary">Back</button></a>
            <hr>
            <h3 class="card-title">Create an ad</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('annonce.store') }}" enctype="multipart/form-data">
                @csrf
                <p class="text-monospace">Update your file here</p>
                <input type="file" name="image" accept="image/*"><br><br>
                <input class="form-control" type="text" name="title" placeholder="Title" required><br>
                <input class="form-control" type="number" step="0.01" min="0" name="price" placeholder="Price" required><br>
                <textarea class="form-control" type="text" name="desc" placeholder="Description" style="height: 250px" required></textarea><br>
                <button class="btn btn-primary" type="submit" name="submit">Upload</button>
            </form>
        </div>
    </div>
</div>
@stop