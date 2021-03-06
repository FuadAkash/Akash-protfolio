@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">create</li>
            </ol>
            <form action="{{route('admin.abouts.update', $about->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Image</h3>
                        <img style="height: 30vh" src="{{url($about->image)}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="image">
                    </div>
                    <div class="from-group col-md-4 mt-3" >
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text" class="from-control" id="title" name="title" value="{{($about->title)}}">
                        </div>
                        <div class="mb-5">
                            <label for="sub_title"><h4>Title-1</h4></label>
                            <input type="text"  class="from-control" id="title_1" name="title_1" value="{{($about->title_1)}}">
                        </div>
                    </div>
                    <div class="from-group col-md-6 mt-3" >
                        <h3>Description</h3>
                        <textarea class="from-control" name="description" cols="30" rows="5">{{($about->description)}}</textarea>
                    </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-primary mt-5">
            </div>
            </form>
    </main>
@endsection