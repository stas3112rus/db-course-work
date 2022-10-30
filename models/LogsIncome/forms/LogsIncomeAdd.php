<?
     $patient = $_POST['patient'];

     if ($patient){
        $doctor = $_POST['doctor'];
        $date_income=str_replace("'","",$_POST['dateIncome']);
        $date_outcome=str_replace("'","",$_POST['dateOutcome']);
        $symptoms=$_POST['symptoms'];
        $diagnosis=$_POST['diagnosis'];
        $drugs=$_POST['drugs'];

        $error=[];
        $checkDates = checkDates($date_income, $date_outcome);
        
        if ($checkDates !=="OK") array_push($error, $checkDates);
        
        $patientInHospital = isPatientInHospital($base, $patient, $date_income, $date_outcome);

        if ($patientInHospital !== "OK") array_push($error, $patientInHospital);

        if (!$error){
            $resInsert = [
                $patient, 
                $doctor, 
                $date_income, 
                $date_outcome, 
                $symptoms, 
                $diagnosis, 
                $drugs
            ];

            $req = insertLogIncome($base, $resInsert);
            
            if ($req == "OK"){
                $id = getMaxInCol($base, 'log_incoming', 'id_log_incoming');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            } else {
                array_push($error, $req); 
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить новую запись в журнал поступления и выписки больных</h1>
    
     <?
        if (!empty($error)) showErrors ($error)
     ?>

    <form method="post">
        <?include ('LogsIncomeField.php')?>
    </form>

</div>