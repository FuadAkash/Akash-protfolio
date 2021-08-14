@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Icon</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">Icon</li>
            </ol>
        <form action="{{route('admin.icon.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
            <div class="row">
                <div class="from-group col-md-3 mt-3" >
                    <h3>Icon</h3>
                    <img style="height: 5vh" src="{{url($icon->icon)}}" class="img-rounded">
                    <input class="mt-3" type="file" id="icon" name="icon">
                </div>
                <div class="from-group col-md-3 mt-3" >
                    <div class="mb-3">
                        <label for="title"><h4>Icon Title</h4></label>
                        <input type="text" class="from-control" id="ic_title" name="ic_title" value="{{$icon->ic_title}}">
                    </div>
                </div>
            </div>
            <input type="submit" name="Submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection