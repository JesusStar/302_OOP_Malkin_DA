<?php

namespace App;

use App\Student;
use App\StudentList;
use PHPUnit\Framework\TestCase;

class StudentListTest extends TestCase
{
    public function createStudentList()
    {
        $student1 = new Student('Malkin', 'Denis', 'FMiIT', 3, '302');
        $student2 = new Student('Ivanov', 'Ivan', 'FBiB', 1, '302B');
        $student3 = new Student('Sidorova', 'Masha', 'GEO', 4, '3022');
        $student4 = new Student('Baulin', 'Gena', 'IES', 2, '502');
        $student5 = new Student('Pushkun', 'Sasha', 'FMiIT', 3, '1302');

        $students = new StudentList();
        $students->add($student1);
        $students->add($student2);
        $students->add($student3);
        $students->add($student4);
        $students->add($student5);
        return $students;
    }

    public function testCurrent()
    {
        $students = $this->createStudentList();

        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $this->assertSame($students->get(1), $students->current());
    }

    public function testNext()
    {
        $students = $this->createStudentList();

        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $this->assertSame($students->get(1), $students->current());
        $students->next();
        $students->next();
        $this->assertSame($students->get(3), $students->current());
    }

    public function testKey()
    {
        $students = $this->createStudentList();

        $this->assertSame($students->get(0)->getId(), $students->key());
        $students->next();
        $this->assertSame($students ->get(1)->getId(), $students->key());
    }

    public function testRewind()
    {
        $students = $this->createStudentList();

        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $students->next();
        $students->next();
        $this->assertSame($students->get(3), $students->current());
        $students->rewind();
        $this->assertSame($students->get(0), $students->current());
    }

    public function testValid()
    {
        $students = $this->createStudentList();

        $this->assertSame($students->get(0), $students->current());
        $students->next();
        $students->next();
        $students->next();
        $students->next();
        $students->next();

        $this->assertFalse($students->valid());
    }

    public function testForeach()
    {
        $students = $this->createStudentList();
        $i = 0;
        foreach ($students as $index => $student) {
            $this->assertSame($students->get($i), $students->current());
            $i++;
        }
    }
}
