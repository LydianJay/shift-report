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


    public function edit($id) {
        $employee = User::find($id);

        return view('pages.employee.edit', ['active_link' => 'employee', 'employee' => $employee]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'dob' => 'required',
            'position' => 'required',
        ]);

        $employee = User::find($id);
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->mname = $request->mname;
        $employee->email = $request->email;
        $employee->contactno = $request->contactno;
        $employee->dob = $request->dob;
        $employee->position = $request->position;
        $employee->save();

        return redirect()->route('employee')->with('success', 'Update Success');
    }

    public function destroy($id) {
        $employee = User::find($id);
        $employee->delete();

        return redirect()->route('employee')->with('success', 'Employee deleted successfully');
    }

    public function search(Request $request) {

        $name = $request->get('name');

        $employee = User::where('fname', 'like', '%' . $name . '%')
                        ->orWhere('lname', 'like', '%' . $name . '%')
                        ->orWhere('mname', 'like', '%' . $name . '%')
                        ->get();

        
        return view('pages.employee.view', ['active_link' => 'employee', 'employees' => $employee]);
    }
}
