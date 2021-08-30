@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">create</li>
            </ol>
            <form action="{{route('admin.protfolios.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT')}}
                <div class="row">
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Big Image</h3>
                        <img style="height: 30vh" src="{{asset('assets/img/big_image.png')}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="big_image">
                    </div>
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Small Image</h3>
                        <img style="height: 30vh" src="{{asset('assets/img/small_image.png')}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="small_image">
                    </div>
                    <div class="from-group col-md-4 mt-3" >
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text" class="from-control" id="title" name="title" value="">
                        </div>
                        <div class="mb-5">
                            <label for="sub_title"><h4>Sub-Title</h4></label>
                            <input type="text"  class="from-control" id="sub_title" name="sub_title" value="">
                        </div>
                    </div>
                    <div class="from-group col-md-6 mt-3" >
                        <h3>Description</h3>
                        <textarea class="from-control" name="description" cols="30" rows="2"></textarea>
                    </div>
                    <div class="from-group col-md-4 mt-3" >
                        <div class="mb-3">
                            <label for="clint"><h4>Client</h4></label>
                            <input type="text"  class="from-control" id="clint" name="clint" value="">
                        </div>
                        <div class="mb-5">
                            <label for="category"><h4>Category</h4></label>
                            <input type="text"  class="from-control" id="category" name="category" value="">
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-primary my-5">
            </div>
            </form>
    </main>
@endsection