<?
     $first_name_patient = $_POST['firstName'];

     if ($first_name_patient){
        
        $first_name_patient = $_POST['firstName'];
        $second_name_patient = $_POST['secondName'];
        $patronymic_name_patient = $_POST['patronymicName'];
        $insurance_policy = $_POST['insurancePolicy'];
        $passport = $_POST['passport'];
        $allergy = $_POST['allergy'];
       

        $error=[];

        $passportCheck = checkPassport($passport);
        if ($passportCheck !== "OK") array_push($error, $passportCheck);

        $insuranceCheck = checkInsuarancePolice($insurance_policy);
        if ($insuranceCheck !== "OK") array_push($error, $insuranceCheck);

       
        if (!$error){
          
            $resInsert = [
                $first_name_patient,
                $second_name_patient,
                $patronymic_name_patient,
                $insurance_policy,
                $passport,
                $allergy
            ];
            
            $req = insertPatient($base, $resInsert);

            if($req == "OK"){
               
                $id = getMaxInCol($base, 'patients', 'id_patients ');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            } else {
                array_push($error, $req);
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить нового пацента</h1>
    
    <?
        if (!empty($error)) showErrors ($error)
    ?>

    <form method="post">
        <?include ('PatientsField.php')?>
    </form>

</div>