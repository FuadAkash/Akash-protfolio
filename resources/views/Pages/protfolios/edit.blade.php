@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
        <form action="{{route('admin.protfolios.update', $protfolio->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="from-group col-md-3 mt-3" >
                    <h3>Big Image</h3>
                    <img style="height: 30vh" src="{{url($protfolio->big_image)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="big_image">
                </div>
                <div class="from-group col-md-3 mt-3" >
                    <h3>Small Image</h3>
                    <img style="height: 30vh" src="{{url($protfolio->small_image)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="small_image">
                </div>
                <div class="from-group col-md-4 mt-3" >
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="from-control" id="title" name="title" value="{{($protfolio->title)}}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub-Title</h4></label>
                        <input type="text"  class="from-control" id="sub_title" name="sub_title" value="{{($protfolio->sub_title)}}">
                    </div>
                </div>
                <div class="from-group col-md-6 mt-3" >
                    <h3>Description</h3>
                    <textarea class="from-control" name="description" cols="30" rows="5">{{($protfolio->description)}}</textarea>
                </div>
                <div class="from-group col-md-4 mt-3" >
                    <div class="mb-3">
                        <label for="clint"><h4>Client</h4></label>
                        <input type="text"  class="from-control" id="clint" name="clint" value="{{($protfolio->clint)}}">
                    </div>
                    <div class="mb-5">
                        <label for="category"><h4>Category</h4></label>
                        <input type="text"  class="from-control" id="category" name="category" value="{{($protfolio->category)}}">
                    </div>
                </div>
            </div>
            <input type="submit" name="Submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection