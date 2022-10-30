<?
   $departments = getAllDepartments($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>Название отделения</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($departments); $i++) {       
                ?>
    <tr>
        <td><? echo  $departments[$i]['id_departments']?></td>
        <td><? echo  $departments[$i]['department_name']?></td>
        <td>
            <a href="edit.php?id=<?echo $departments[$i]['id_departments']?>" class="btn btn-info">Редактировать</a>
            <a href="?delete=<?echo $departments[$i]['id_departments']?>" class="btn btn-danger">Удалить</a>
        </td>
    </tr>
    <?}?>
    </tbody>
</table>