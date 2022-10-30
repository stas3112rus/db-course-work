<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];
    
    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $log = getLogsIncomeById ($base,$id);
        $patient = $log[0]['patient_ref'];
        $doctor = $log[0]['doctors_ref'];
        $date_income=$log[0]['date_income'];
        $date_outcome=$log[0]['date_outcome'];
        $symptoms=$log[0]['symptoms'];
        $diagnosis=$log[0]['diagnosis'];
        $drugs=$log[0]['drugs'];

    } else {
        
        $patient = $_POST['patient'];
        $doctor = $_POST['doctor'];
        $date_income=str_replace("'","",$_POST['dateIncome']);
        $date_outcome=str_replace("'","",$_POST['dateOutcome']);
        $symptoms=$_POST['symptoms'];
        $diagnosis=$_POST['diagnosis'];
        $drugs=$_POST['drugs'];

        // Проверка бизнес логики на ошибки
        $error=[];


        $checkDates = checkDates($date_income, $date_outcome);
        if ($checkDates !=="OK") array_push($error, $checkDates);

        if (!$error){
            
            $resUpdate = [
                $id_update,
                $patient, 
                $doctor, 
                $date_income, 
                $date_outcome, 
                $symptoms, 
                $diagnosis, 
                $drugs
            ];     
            
            $req = updateLogIncome($base, $resUpdate); 

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
            echo '<button type="button" class="btn btn-success">Запись успешно создана</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Запись успешно отредактирована</button>';
        }
    ?>
    <h1 class="field__title">Изменение в журнале поступления и выписки больных</h1>
   
    <?
        if (!empty($error)) showErrors ($error)
    ?>

    <form method="post">
        <?include ('LogsIncomeField.php')?>
    </form>

</div>