@extends('layout')

@section('title', 'Employee')

@section('contain')

<div class="d-flex gap-5 align-items-center">
    <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1b1818" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM149.66,93.66,115.31,128l34.35,34.34a8,8,0,0,1-11.32,11.32l-40-40a8,8,0,0,1,0-11.32l40-40a8,8,0,0,1,11.32,11.32Z"></path></svg></a>
    <h2>Add Employee</h2>
</div>

<div class="mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="my-5 d-flex justify-content-center">
    <div class="card p-5" style="width: 50rem;">
        <form action="/employee" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label fw-bold">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select One</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label fw-bold">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea >
            </div>
            <div class="mb-5">
                <label for="job" class="form-label fw-bold">Job</label>
                <select name="job_id" id="job" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($jobsList as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                     @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="photo" class="form-label fw-bold">Image</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo" >
                  </div>
                </div>
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
      </div>
</div>
    

@endsection