<?php

use Task03\Student;
use Task03\StudentList;

function runTest()
{

    // String representation test
    echo PHP_EOL .  "TEST1 (String representation test)";
    $student1 = new Student('Malkin', 'Denis', 'FMiIT', 3, '302');
    $correct =
        "Id: 1" . PHP_EOL .
        "Фамилия: Malkin" . PHP_EOL .
        "Имя: Denis" . PHP_EOL .
        "Факультет: FMiIT" . PHP_EOL .
        "Группа: 302" . PHP_EOL;

    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $student1 . PHP_EOL;
    if ($student1 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST2 (current interface test)";
    $student1->setLastname('Ivanov')->setFaculty('IES');
    $correct =
        "Id: 1" . PHP_EOL .
        "Фамилия: Ivanov" . PHP_EOL .
        "Имя: Denis" . PHP_EOL .
        "Факультет: IES" . PHP_EOL .
        "Группа: 302" . PHP_EOL;

    echo 'Ожидается: ' . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $student1 . PHP_EOL;
    if ($student1 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST3 (gets test)" . PHP_EOL;
    $correct = 3;
    $result = $student1->getCourse();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'Ivanov';
    $result = $student1->getLastname();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'Denis';
    $result = $student1->getName();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = '302';
    $result = $student1->getGroup();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'IES';
    $result = $student1->getFaculty();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST4 (auto increment)" . PHP_EOL;
    $correct = 1;
    $result = $student1->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $student2 = new Student('Petrov', 'Ivan', 'GEO', 1, '101');
    $correct = 2;
    $result = $student2->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $student3 = new Student('Sidorova', 'Masha', 'BIO', 2, '102M');
    $correct = 3;
    $result = $student3->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST5 (add and get in StudentList test)" .  PHP_EOL;
    $students = new StudentList();
    $students->add($student1);
    $correct = $student1;
    $result = $students->get(0);
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $result . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST6 (count in StudentList test)" .  PHP_EOL;
    $students->add($student2);
    $students->add($student3);
    $correct = 3;
    $result = $students->count();
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $result . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST7 (get nothing(if 'n' is more than elements in the list) in StudentList test)" .  PHP_EOL;
    $correct = null;
    $result = $students->get(12);
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST8 store in file" .  PHP_EOL;
    $students->store('Students.txt');
    if (file_exists('Students.txt')) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST9 load file" .  PHP_EOL;
    $studentsNew = new StudentList();
    $studentsNew->load('Students.txt');
    if ($studentsNew->get(0) == $students->get(0)) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
}
