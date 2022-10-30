<?php
    include ('../../mysql.php');
    include ('../../function/function.php');
    include ('../../models/Patients/utils/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.min.css">
    <title>Добавить пацента</title>
</head>
<body>
    <section class='main'>
        <?include ('../../components/Menu.php')?>
        <?include ('../../models/Patients/forms/PatientsAdd.php')?>
    </section>
</body>
</html>