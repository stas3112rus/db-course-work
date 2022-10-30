<?
     $department_name = $_POST['departmentName'];

     if ($department_name){  

        $error=[];
       
        if (!$error){
          
            $resInsert = [ $department_name];
           
            if (insertDepartment($base, $resInsert) == "OK"){
               
                $id = getMaxInCol($base, 'departments', 'id_departments ');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить новое отделение</h1>
    
    <form method="post">
        <?include ('DepartmentsField.php')?>
    </form>

</div>