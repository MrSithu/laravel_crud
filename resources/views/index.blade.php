@extends('layout.master')
@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <a href="{{url('/create')}}" class="btn btn-sm btn-outline-success">Create</a>
                    Hello Laravel
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>id</th>
                                <th>image</th>
                                <th>name</th>
                                <th>department</th>
                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $i)
                            <tr class="text-center">
                                <td>{{$i->id}}</td>
                                <td>
                                    <img src="{{asset($i->image)}}" width="100px" height="100px" style="border-radius:50px" alt="user-image">
                                </td>
                                <td>{{$i->name}}</td>
                                <td>{{$i->department}}</td>
                                <td>
                                    <a href="{{url('/edit',$i->id)}}" class="btn btn-sm btn-warning">update</a>
                                    <a href="{{url('/delete',$i->id)}}" class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                        {{$items->links();}}
                </div>
            </div>
        </div>
    </div>
</div>

