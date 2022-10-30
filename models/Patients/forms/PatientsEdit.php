<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];
    
    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $patient = getPatientById ($base,$id);
        $first_name_patient = $patient[0]['first_name_patient'];
        $second_name_patient = $patient[0]['second_name_patient'];
        $patronymic_name_patient = $patient[0]['patronymic_name_patient'];
        $insurance_policy = $patient[0]['insurance_policy'];
        $passport = $patient[0]['passport'];
        $allergy = $patient[0]['allergy'];

    } else {
        
        $first_name_patient = $_POST['firstName'];
        $second_name_patient = $_POST['secondName'];
        $patronymic_name_patient = $_POST['patronymicName'];
        $insurance_policy = $_POST['insurancePolicy'];
        $passport = $_POST['passport'];
        $allergy = $_POST['allergy'];

        // Проверка бизнес логики на ошибки
        $error=[];

        $passportCheck = checkPassport($passport);
        if ($passportCheck !== "OK") array_push($error, $passportCheck);

        $insuranceCheck = checkInsuarancePolice($insurance_policy);
        if ($insuranceCheck !== "OK") array_push($error, $insuranceCheck);


        if (!$error){
            
            $resUpdate = [
                $id_update,
                $first_name_patient,
                $second_name_patient,
                $patronymic_name_patient,
                $insurance_policy,
                $passport,
                $allergy
            ];

            $req = updatePatient($base, $resUpdate);
            
            if ($req == "OK"){
                $successesEdit = true;
                $successesAdd = false;
            } else {
                array_push($error, $req);
            }
        } 
    }
?>

<div class="field">
    <?
        if ($successesAdd) {
            echo '<button type="button" class="btn btn-success">Пациент успешно создан</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Пациент успешно отредактирован</button>';
        }
    ?>
    <h1 class="field__title">Изменение в данных пациента</h1>
    
    <?
        if (!empty($error)) showErrors ($error)
     ?>
    
    <form method="post">
        <?include ('PatientsField.php')?>
    </form>

</div>