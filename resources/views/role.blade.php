@extends('layout')

@section('title', 'Jobs')

@section('contain')


<h1>Role</h1>

<div class="mt-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        @foreach ($rolesList as $data)
            <tbody>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
            </tbody>
        @endforeach
      </table>
</div>

    

@endsection