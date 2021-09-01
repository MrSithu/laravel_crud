@extends('layout.master')
@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <a href="/" class="btn btn-sm btn-outline-success">Back</a>
                    Hello Laravel
                </div>
                <div class="card-body">
                    <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter your name</label>
                            <input type="text" name="name" id="name" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        @error('name')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <div class="form-group">
                            <label for="department">Enter your department</label>
                            <input type="text" name="department" id="department" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        @error('department')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <div class="form-group">
                            <label for="image">Select image</label>
                            <input type="file" name="image" id="image" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        @error('image')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <input type="submit" value="Create" class="btn btn-sm btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
