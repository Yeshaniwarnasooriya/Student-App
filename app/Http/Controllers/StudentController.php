<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facades\StudentFacade;
use Illuminate\Http\Request;

class StudentController extends ParentController
{
    
    public function index()
    {
        $response['students'] = StudentFacade::all();
        return view('pages.student.index')->with($response);
    }

    //Function to store data
    public function create(Request $request)
    {
        StudentFacade::create($request->all());
        //User redirected back once the task is completed
        return redirect()->back();
    }

    //Function to delete data
    public function remove($student_id)
    {
        StudentFacade::remove($student_id);
        return redirect()->back();
    }

    //Function to alter status
    public function active($student_id)
    {
        StudentFacade::active($student_id);    
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['student'] = StudentFacade::get($request['student_id']);
        return view('pages.student.edit')->with($response);
    }

    public function update(Request $request, $student_id)
    {
        StudentFacade::update($request->all(), $student_id);
        return redirect()->back();
    }
}