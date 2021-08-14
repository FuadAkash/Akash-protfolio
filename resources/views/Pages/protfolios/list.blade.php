@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of projects</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">List of projects</li>
            </ol>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>             
                    <th scope="col">Title</th>
                    <th scope="col">Sub title</th>
                    <th scope="col">Big image</th>
                    <th scope="col">Small image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($protfolios) > 0)
                        @foreach ($protfolios as $protfolio)
                            <tr>
                                <th scope="row">{{$protfolio->id}}</th>
                                <td>{{$protfolio->title}}</td>
                                <td>{{$protfolio->sub_title}}</td>
                                <td><img style="height: 10vh" src="{{url($protfolio->big_image)}}" alt="big_image"></td>
                                <td><img style="height: 10vh" src="{{url($protfolio->small_image)}}" alt="small_image"></td>
                                <td>{{Str::limit(strip_tags($protfolio->description),40)}}</td>
                                <td>{{$protfolio->clint}}</td>
                                <td>{{$protfolio->category}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="{{route('admin.protfolios.edit', $protfolio->id)}}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <form action="{{route('admin.protfolios.destroy', $protfolio->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach    
                    @endif                
                </tbody>
              </table>
    </main>
@endsection