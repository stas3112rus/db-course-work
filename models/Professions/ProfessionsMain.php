<?
    $delete=$_GET['delete'];
    $error=[];

    if (!empty($delete)){

        $req = deleteRow($base, 'professions', 'id_professions', $delete);

        if ($req === "OK"){
            $delete_success = true;
        } else {
            array_push($error, $req); 
        }

    }
?>

<div class="field">
    <h1 class="field__title">Профессии врачей</h1>
        <?
            if ($delete_success) {
                echo '<button type="button" class="btn btn-success">
                        Профессия '.$delete.' успешно удалена
                    </button>
                ';
            }
        ?>
        <?
            if (!empty($error)) showErrors ($error)
        ?>
    <div class="field__add">
        <a href="add.php" class="btn btn-primary">Добавить</a>

    </div>
    <div class="field__table">
        <? include ('components/ProfessionsTable.php')?>
    </div>
</div>

