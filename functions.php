<?php

include "info.php";

function printMe($arr){
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
}


$studentAge = array(); // ініціалізуємо масив в який будемо записувати вік студентів
$print_student = array(); // масив для друку де буде зібрана загальна інформація про студентів і аудиторії

foreach($groups as $group => $student){

    foreach($student as $key => $info){
        // додаємо в масив ключ - унікальний номер студента(№групи - №студента) та зачення - вік студента
        // додаємо студента лише якщо він старший 21 року
        if($info["age"]>=21){
            $studentAge[$group."-".$key] = $info["age"];
        };

        $i = 0; // іттератор для елементів масиву $studentAge

        foreach($classrooms as &$classroom){ // присвоюємо кожній аудиторії відповідального зі списку найстарших студентів
            $responsible_student = key(array_slice($studentAge, $i, 1)); // почергово присвоюємо кожен ключ масиву $studentAge
            if(!is_null($responsible_student)){ // перевіряємо чи в масиві $studentAge ще є значення
                $classroom["responsible student"] = $responsible_student;
            } else {
                $classroom["responsible student"] = "";
            };
            $i++;
        };
    };

    foreach($student as $item => $info){
        // створюэмо уныкальний номер студента
        $id = $group."-".$item;
        // створюємо масив в якому зберігатиметься інформація про конкретного студента
        $print_student[$id] = array();
        // переносимо інформацію з масиву $groups в масив $print_student
        $print_student[$id]["group"] = $group;
        $print_student[$id]["surname"] = $info["surname"];
        $print_student[$id]["name"] = $info["name"];
        $print_student[$id]["age"] = $info["age"];
        // вважаємо, що за замовчуванням студент не прив'язаний до аудиторії
        $print_student[$id]["classroom"] = "no classroom";
        // перевіряємо чи студент прив'язаний до якоїсь аудиторії
        // якщо так, присвоюємо йому назву цієї аудиторії
        foreach($classrooms as $classroom){ 
            if(in_array($id, $classroom)){
                $print_student[$id]["classroom"] = $classroom["name"];
            };
        };   
    };

};
