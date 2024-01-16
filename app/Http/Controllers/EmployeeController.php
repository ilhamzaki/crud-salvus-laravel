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
    public function index(Request $request) {

        $keyword = $request->keyword;
        $employee = Employee::where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('gender', $keyword)
                            ->orWhere('email','LIKE', '%'.$keyword.'%')
                            ->orWhere('phone','LIKE', '%'.$keyword.'%')
                            ->paginate(10);
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

        $requestName = $request->name;
        $fileName = "";
        
        // photo diambil dari form id/name 
        if($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = str_replace(' ', '-', $requestName);
            $fileName = $fileName.'-'.time().'.'.$extension;
            $request->file('photo')->storeAs('images', $fileName);
        }

        // membuat object baru bernama image (samakan dengan coloum database)
        $request['image'] = $fileName;
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
        $requestName = $request->name;
        $fileName = "";
        
        // photo diambil dari form id/name 
        if($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = str_replace(' ', '-', $requestName);
            $fileName = $fileName.'-'.time().'.'.$extension;
            $request->file('photo')->storeAs('images', $fileName);
            $request['image'] = $fileName;
        } else {
            $request['image'] = $employee->image;
        }

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
