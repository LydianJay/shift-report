<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class EmployeeController extends Controller
{
    public function index() {

        $employees = User::all();

        return view('pages.employee.view', ['active_link' => 'employee', 'employees' => $employees]);
    }


    public function create() {
        return view('pages.employee.create', ['active_link' => 'employee']);
    }

    public function store(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'dob' => 'required',
            'position' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $employee = new User();
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->mname = $request->mname;
        $employee->email = $request->email;
        $employee->contactno = $request->contactno;
        $employee->dob = $request->dob;
        $employee->position = $request->position;
        $employee->password = $request->password;
        $employee->save();


        return redirect()->route('employee_create')->with('success', 'Employee created successfully');
    }
}
