<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];
    
    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $doctor = getDoctorById ($base,$id);      

        $first_name_doctor = $doctor[0]['first_name_doctor'];
        $second_name_doctor = $doctor[0]['second_name_doctor'];
        $patronymic_name_doctor = $doctor[0]['patronymic_name_doctor'];
        $proffesion_ref = $doctor[0]['proffesion_ref'];
        $chambers_ref = $doctor[0]['chambers_ref'];       

    } else {
        
        $first_name_doctor = $_POST['firstName'];
        $second_name_doctor = $_POST['secondName'];
        $patronymic_name_doctor = $_POST['patronymicName'];
        $proffesion_ref = $_POST['proffesion'];
        $chambers_ref = $_POST['chamber'];

        // Проверка бизнес логики на ошибки
        $error=[];

        if (!$error){
            
            $resUpdate = [
                $id_update,
                $first_name_doctor,
                $second_name_doctor,
                $patronymic_name_doctor,
                $proffesion_ref, 
                $chambers_ref
            ];
            
            $req = updateDoctor ($base, $resUpdate);

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
            echo '<button type="button" class="btn btn-success">Врач успешно создан</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Врач успешно отредактирован</button>';
        }
    ?>
    <h1 class="field__title">Изменение в данных врача</h1>
    <?
        if (!empty($error)) showErrors ($error)
    ?>
    <form method="post">
        <?include ('DoctorsField.php')?>
    </form>

</div>