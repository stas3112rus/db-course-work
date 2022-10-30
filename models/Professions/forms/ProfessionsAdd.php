<?
     $profession = $_POST['profession'];

     if ($profession){
        $error=[];

        if (!$error){
            $resInsert = [$profession];
            
            $req = insertProfession($base, $resInsert);

            if ($req == "OK"){
                $id = getMaxInCol($base, 'professions', 'id_professions');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            } else {
                array_push($error, $req);
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить новую профессию</h1>
    <?
        if (!empty($error)) showErrors ($error)
    ?>
    <form method="post">
        <?include ('ProfessionsField.php')?>
    </form>

</div>