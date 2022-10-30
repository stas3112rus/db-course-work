<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];

    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $data = getProfessionById($base, $id);
        $profession = $data[0]['profession'];
        
    } else {
        
        $profession = $_POST['profession'];
       
        // Проверка бизнес логики на ошибки
        $error=[];

        if (!$error){
            
            $resUpdate = [$id_update, $profession];
            
            $req =updateProfession($base, $resUpdate); 

            if (updateProfession($base, $resUpdate) == "OK"){
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
            echo '<button type="button" class="btn btn-success">Профессия успешно создана</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Профессия успешно отредактирована</button>';
        }
    ?>
    <?
        if (!empty($error)) showErrors ($error)
    ?>
    <h1 class="field__title">Изменение в профессии</h1>
    <form method="post">
        <?include ('ProfessionsField.php')?>
    </form>

</div>