<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        return view("employee.index");
    }

    public function create()
    {
        $departments = Department::orderBy('title')->get();
        return view('employee.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        User::create($request->only('employee_id', 'name', 'email', 'phone', 'nrc_number', 'gender', 'birthday', 'address', 'department_id', 'date_of_join', 'is_present', 'password'));

        return redirect()->route("employee.index")->with('created', 'Employee is successfully created');
    }

    public function edit(User $employee)
    {
        $departments = Department::orderBy('title')->get();
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function show($id)
    {
        return $id;
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = User::where('id', $id)->firstOrFail();
        $employee->update($request->only('employee_id', 'name', 'email', 'phone', 'nrc_number', 'gender', 'birthday', 'address', 'department_id', 'date_of_join', 'is_present'));

       if($request->filled('password')) {
           $employee->update($request->only('password'));
       }

        return redirect()->route('employee.index')->with('updated', 'Employee is successfully updated');
    }

    public function destroy(User $employee)
    {
        $employee->delete();
        return 'success';
    }

    public function serverSide()
    {
        $user = User::with('department');
        return datatables($user)
        ->addColumn('department_name', function($each) {
           return $each->department ? $each->department->title : ' - ';
        })
        ->editColumn('is_present', function($each) {
            if($each->is_present == 1) {
                return '<span class="badge badge-pill badge-success px-3 py-2">Present</span>';
            } else {
                return '<span class="badge badge-pill badge-danger px-3 py-2">Leave</span>';
            }
        })
        ->addColumn('action', function($each) {
            $detail_icon = '<a href="'.route('employee.show', $each->id).'" class="btn text_theme"><i class="fas fa-user"></i></a>';
            $edit_icon = '<a href="'.route('employee.edit', $each->id).'" class="btn mx-1"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="#" class="btn text-danger delete_btn" data-id="'.$each->id.'"><i class="fas fa-trash"></i></a>';

            return $detail_icon . ' ' . $edit_icon . ' ' . $delete_icon;
        })
        ->rawColumns(['is_present', 'action'])
        ->toJson();
    }
}
