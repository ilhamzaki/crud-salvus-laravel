@extends('layout')

@section('title', 'Employees')

@section('contain')


<h1>Employee</h1>

<div class="mt-5"><a href="/employee-add" class="btn btn-primary">Add Data</a></div>

@if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
    {{Session::get('message')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="mt-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($employessList as $data)
            <tbody>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->gender}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->phone}}</td>
              <td>
                <a href="/employee/{{$data->id}}" class="btn btn-primary">Detail</a>
                <a href="/employee-edit/{{$data->id}}" class="btn btn-warning">Edit</a>
                <form action="/employee-destroy/{{$data->id}}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tbody>
        @endforeach
      </table>
</div>

    

@endsection