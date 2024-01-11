<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index() {
        
        $jobs = Job::all();
        return view("job", ["jobsList"=> $jobs]);
    }
}
