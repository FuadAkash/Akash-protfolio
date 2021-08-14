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
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($services) > 0)
                        @foreach ($services as $services)
                            <tr>
                                <th scope="row">{{$services->id}}</th>
                                <td>{{$services->icon}}</td>
                                <td>{{$services->title}}</td>
                                <td>{{Str::limit(strip_tags($services->description),40)}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('admin.projects.edit', $services->id)}}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <form action="{{route('admin.projects.destroy', $services->id)}}" method="POST">
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