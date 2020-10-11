<?php
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <table>
        <caption>Students</caption>
        <tr>
            <th>№</th>
            <th>Group</th>
            <th>Unique number</th>
            <th>Surname and name</th>
            <th>Age</th>
            <th>Classroom</th>
        </tr>
        <?php
        $i = 1; // іттератор нумерації студентів
        foreach($print_student as $key => $student){
        ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$student["group"]?></td>
                <td><?=$key?></td>
                <td><?=$student["surname"]." ".$student["name"]?></td>
                <td><?=$student["age"]?></td>
                <td><?=$student["classroom"]?></td>
            </tr>
        <?php }; ?>

    </table>
    
</body>
</html>