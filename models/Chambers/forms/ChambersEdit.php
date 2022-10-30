<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];
    
    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $chambers = getChamberById ($base,$id);
        $departments_ref = $chambers[0]['departments_ref'];
        $number_chambers = $chambers[0]['number_chambers'];

    } else {        
        $departments_ref = $_POST['department'];
        $number_chambers = $_POST['chamber'];

        // Проверка бизнес логики на ошибки
        $error=[];

        if (!$error){
            
            $resUpdate = [
                $id_update,
                $departments_ref,
                $number_chambers
            ]; 
            
            $req = updateChamber($base, $resUpdate); 

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
            echo '<button type="button" class="btn btn-success">Больничная палата успешно создана</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Больничная палата успешно отредактирована</button>';
        }
    ?>
    <h1 class="field__title">Изменение в данных в больничной палате</h1>
   
    <?
        if (!empty($error)) showErrors ($error)
    ?>

    <form method="post">
        <?include ('ChambersField.php')?>
    </form>

</div>