<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        $response['students'] = $this->student->all();
        return view('pages.student.index')->with($response);
    }

    //Function to store data
    public function create(Request $request)
    {
        $this->student->create($request->all());

        //User redirected back once the task is completed
        return redirect()->back();
    }

    //Function to delete data
    public function remove($student_id)
    {
        $student = $this->student->find($student_id);
        $student->delete();

        return redirect()->back();
    }

    //Function to Update status
    public function active($student_id)
    {
        $student = $this->student->find($student_id);
        $student->status = 1;
        $student->update();

        return redirect()->back();
    }
}