@extends('layout')

@section('title', 'Employee')

@section('contain')

<div class="d-flex gap-5 align-items-center">
    <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1b1818" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM149.66,93.66,115.31,128l34.35,34.34a8,8,0,0,1-11.32,11.32l-40-40a8,8,0,0,1,0-11.32l40-40a8,8,0,0,1,11.32,11.32Z"></path></svg></a>
    <h2>Detail Employee {{$employee->name}} ({{$employee->job->name}})</h2>
</div>

<div class="mt-5 d-flex justify-content-center">
    <div style="width: 50rem;">
        <ul class="list-group">
            <li class="list-group-item"><span class="fw-bold">Name : </span>{{$employee->name}}</li>
            <li class="list-group-item"><span class="fw-bold">Gender : </span>{{$employee->gender}}</li>
            <li class="list-group-item"><span class="fw-bold">Email : </span>{{$employee->email}}</li>
            <li class="list-group-item"><span class="fw-bold">Phone : </span>{{$employee->phone}}</li>
            <li class="list-group-item"><span class="fw-bold">Address : </span>{{$employee->address}}</li>
            <li class="list-group-item"><span class="fw-bold">Job : </span>{{$employee->job->name}}</li>
        </ul>
    </div>
</div>
    

@endsection