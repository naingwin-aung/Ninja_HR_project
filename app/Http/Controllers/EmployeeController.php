<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view("employee.index");
    }

    public function serverSide()
    {
        $user = User::query();
        return datatables($user)->toJson();
    }
}
