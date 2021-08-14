@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of abouts</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Main</a></li>
            <li class="breadcrumb-item active">List of abouts</li>
            </ol>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>             
                    <th scope="col">Title</th>
                    <th scope="col">Title_1</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($abouts) > 0)
                        @foreach ($abouts as $about)
                            <tr>
                                <th scope="row">{{$about->id}}</th>
                                <td>{{$about->title}}</td>
                                <td>{{$about->title_1}}</td>
                                <td><img style="height: 10vh" src="{{url($about->image)}}" alt="image"></td>
                                <td>{{Str::limit(strip_tags($about->description),40)}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="{{route('admin.abouts.edit', $about->id)}}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <form action="{{route('admin.abouts.destroy', $about->id)}}" method="POST">
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