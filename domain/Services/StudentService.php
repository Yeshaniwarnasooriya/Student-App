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

    public function get($student_id)
    {
        return $this->student->find($student_id);
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

    //Function to alter status
    public function active($student_id)
    {
        $student = $this->student->find($student_id);
        $student->status = 1;
        $student->update();
    }

    //Function to update data
    public function update(array $data, $student_id)
    {
        $student = $this->student->find($student_id);
        $student->update($this->edit($student, $data));
    }

    protected function edit(Student $student, $data)
    {
        return array_merge($student->toArray(), $data);
    }

}