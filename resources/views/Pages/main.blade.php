@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">Main</li>
            </ol>
        <form action="{{route('admin.main.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
            <div class="row">
                <div class="from-group col-md-3 mt-3" >
                    <h3>Background Image</h3>
                    <img style="height: 30vh" src="{{(@$main->bc_img)?url($main->bc_img):asset("assets/img/bc_img.png")}}" class="img-thumbnail">
                    <input class="mt-3" type="file" id="bc_img" name="bc_img">
                </div>
                <div class="from-group col-md-3 mt-3" >
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="from-control" id="title" name="title" value="{{(@$main->title)?$main->title:"THE NEW ERA"}}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub-Title</h4></label>
                        <input type="text"  class="from-control" id="sub_title" name="sub_title" value="{{(@$main->subtitle)?$main->sub_title:"THE NEW ERA BEGINS"}}">
                    </div>
                    <div>
                    <h4>Upload Resume</h4>
                    <input class="mt-2" type="file" id="resume" name="resume">
                    </div>
                </div>
            </div>
            <input type="submit" name="Submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection
                