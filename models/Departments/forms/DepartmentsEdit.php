<?
    $id=$_GET['id'];
    $id_update = $_POST['id_update'];
    
    $successesAdd = $_GET['successesAdd'];

    if  (empty($id_update)){     
          
        $department = getDepartmentById ($base,$id);
        $department_name = $department[0]['department_name'];
      
    } else {        
        $department_name = $_POST['departmentName'];

        // Проверка бизнес логики на ошибки
        $error=[];

        if (!$error){
            
            $resUpdate = [
                $id_update,
                $department_name
            ];              
            if (updateDepartment($base, $resUpdate) == "OK"){
                $successesEdit = true;
                $successesAdd = false;
            }
            ;
        } 
    }
?>

<div class="field">
    <?
        if ($successesAdd) {
            echo '<button type="button" class="btn btn-success">Отделение успешно создано</button>';
        }

        if ($successesEdit) {
            echo '<button type="button" class="btn btn-success">Отделение успешно отредактировано</button>';
        }
    ?>
    <h1 class="field__title">Изменение в данных отделения</h1>
    <form method="post">
        <?include ('DepartmentsField.php')?>
    </form>

</div>