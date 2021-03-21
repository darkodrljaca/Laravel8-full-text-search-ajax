<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    function index() {
        return view('employees.index');
    }
    
    function searchEmployee(Request $request) {
        
        if($request->ajax()) {
            $data = Employee::search($request->get('search_text'))->get();
            return response()->json($data);
        }
        
    }
    
}


