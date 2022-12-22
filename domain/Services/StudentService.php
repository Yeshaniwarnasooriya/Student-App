<?php

namespace domain\Services;

use App\Models\Student;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function all()
    {
        return $this->student->all();
    }

    //Function to store data
    public function create($data)
    {
        $this->student->create($data);
    }

    //Function to delete data
    public function remove($student_id)
    {
        $student = $this->student->find($student_id);
        $student->delete();
    }

    //Function to Update status
    public function active($student_id)
    {
        $student = $this->student->find($student_id);
        $student->status = 1;
        $student->update();
    }
}