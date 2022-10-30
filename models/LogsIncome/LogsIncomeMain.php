<?
    $delete=$_GET['delete'];
    $error=[];


    if (!empty($delete)){
        $req = deleteRow($base, 'log_incoming', 'id_log_incoming', $delete);
        if ($req === "OK"){
            $delete_success = true;
        } else {
            array_push($error, $req); 
        }
    }
?>

<div class="field">
    <h1 class="field__title">Журнал поступления и выписки больных</h1>
        <?
            if ($delete_success) {
                echo '<button type="button" class="btn btn-success">
                        Запись '.$delete.' успешно удалена
                    </button>
                ';
            }
        ?>
        <?
            if (!empty($error)) showErrors ($error);
        ?>
    <div class="field__add">
        <a href="./pages/logsincome/add.php" class="btn btn-primary">Добавить</a>

    </div>
    <div class="field__table">
        <? include ('components/LogsIncomeTable.php')?>
    </div>
</div>

