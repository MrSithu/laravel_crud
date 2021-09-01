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
                    <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Enter your name</label>
                            <input type="text" name="name" value="{{$item->name}}" id="name" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        @error('name')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <div class="form-group">
                            <label for="department">Enter your department</label>
                            <input type="text" name="department" value="{{$item->department}}" id="department" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        @error('department')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <div class="form-group">
                            <label for="image">Select image</label>
                            <input type="file" name="image" id="image" class="@error('name') border border-danger @enderror form-control">
                        </div>
                        <div>
                            <img src="{{asset($item->image)}}" width="100px" height="100px" style="border-radius: 50px" alt="">
                        </div>
                        @error('image')
                            <small class="alert alert-danger">{{$message}}</small><br>
                        @enderror
                        <input type="submit" value="Update" class="btn btn-sm btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
