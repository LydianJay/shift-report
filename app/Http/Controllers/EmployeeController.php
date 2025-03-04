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
}
