<?
    $delete=$_GET['delete'];

    $error=[];

    if (!empty($delete)){

        $req = (deleteRow($base, 'departments', 'id_departments', $delete));

        if ($req === "OK"){
            $delete_success = true;
        } else {
            array_push($error, $req);  
        }

    }
?>

<div class="field">
    <h1 class="field__title">Отделение</h1>
        <?
            if ($delete_success) {
                echo '<button type="button" class="btn btn-success">
                        Отделение '.$delete.' успешно удалено
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
        <? include ('components/DepartmentsTable.php')?>
    </div>
</div>

