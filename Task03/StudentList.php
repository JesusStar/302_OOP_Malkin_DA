<?php

namespace Task03;

use Task03\Student;

class StudentList
{
    private $students = array();

    public function add(Student $student)
    {
        array_push($this->students, $student);
    }

    public function count(): int
    {
        return count($this->students);
    }

    public function get(int $n): ?Student
    {
        return $this->students[$n] ?? null;
    }

    public function store(string $fileName)
    {
        file_put_contents($fileName, serialize($this->students));
    }

    public function load(string $fileName)
    {
        $data = file_get_contents($fileName);
        $this->students = unserialize($data);
    }
}
