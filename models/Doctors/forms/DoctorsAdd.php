<?
     $first_name_doctor = $_POST['firstName'];

     if ($first_name_doctor){
        
        $first_name_doctor = $_POST['firstName'];
        $second_name_doctor = $_POST['secondName'];
        $patronymic_name_doctor = $_POST['patronymicName'];
        $proffesion_ref = $_POST['proffesion'];
        $chambers_ref = $_POST['chamber'];
       

        $error=[];
       
        if (!$error){
          
            $resInsert = [
                $first_name_doctor,
                $second_name_doctor,
                $patronymic_name_doctor,
                $proffesion_ref,
                $chambers_ref
            ];
           
            $req = insertDoctor($base, $resInsert); 

            if ($req == "OK"){
               
                $id = getMaxInCol($base, 'doctors', 'id_doctors');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            } else {
                array_push($error, $req);
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить нового врача</h1>
    <?
        if (!empty($error)) showErrors ($error)
    ?>
    <form method="post">
        <?include ('DoctorsField.php')?>
    </form>

</div>