@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">create</li>
            </ol>
        <form action="{{route('admin.projects.update', $services->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="from-group col-md-3 mt-3" >
                    <div class="mb-3">
                        <label for="icon"><h4>Front Awesome Icon</h4></label>
                        <input type="text" class="from-control" id="icon" name="icon" value="{{$services->icon}}">
                    </div>
                    <div class="mb-5">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text"  class="from-control" id="title" name="title" value="{{$services->title}}">
                    </div>
                    <div class="mb-5">
                        <label for="description"><h4>Description</h4></label>
                        <textarea type="text"  class="from-control" id="description" name="description">{{$services->description}}</textarea>
                    </div>
                </div>
            </div>
            <input type="submit" name="Submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection