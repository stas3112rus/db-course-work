<?
   $doctors = getAllDoctors($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>ФИО Врача</th>
            <th>Профессия</th>
            <th>Отделение</th>
            <th>Палата</th>         
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($doctors); $i++) {       
                ?>
    <tr>
        <td><? echo  $doctors[$i]['id_doctors']?></td>
        <td>
            <?echo 
                getFullName(
                    $doctors[$i]['first_name_doctor'], 
                    $doctors[$i]['second_name_doctor'], 
                    $doctors[$i]['patronymic_name_doctor']
                ) 
            ?>
        </td>
        <td><? echo  $doctors[$i]['profession']?></td>
        <td><? echo  $doctors[$i]['department_name']?></td>  
        <td><? echo  $doctors[$i]['number_chambers']?></td> 
        <td>
            <a href="edit.php?id=<?echo $doctors[$i]['id_doctors']?>" class="btn btn-info">Редактировать</a>
            <a href="?delete=<?echo $doctors[$i]['id_doctors']?>" class="btn btn-danger">Удалить</a>
        </td>
    </tr>
    <?}?>
    </tbody>
</table>