<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    public function index() {

        $employee = Employee::all();
        return view("employee", ["employessList"=> $employee]);
    }

    public function show($id) {

        $employee = Employee::with('job')->find($id);
        return view("employee-detail", ["employee"=> $employee]);
    }
    public function create() {
        $jobs = Job::all();
        return view("employee-add", ["jobsList"=> $jobs]);
    }
    public function store(EmployeeCreateRequest $request) {

       $employee = Employee::create($request->all());

       if($employee) {
          Session::flash("status","success");
          Session::flash("message","Add new employee success!");
       }

       return redirect("/");
    }
    public function edit($id) {
        $employee = Employee::with('job')->findOrFail($id);
        $jobs = Job::where('id', '!=' , $employee->job_id)->get(['id', 'name']);
        return view("employee-edit", ["employee"=> $employee, "jobsList"=> $jobs]);
    }

    public function update(EmployeeUpdateRequest $request, $id) {
        
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        if($employee) {
            Session::flash("status","success");
            Session::flash("message","Edit employee success!");
         }

        return redirect("/");
    }

    public function destroy($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();

       if($employee) {
          Session::flash("status","success");
          Session::flash("message","Delete employee success!");
       }

       return redirect("/");
    }
}
