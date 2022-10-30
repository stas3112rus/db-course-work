<?
   $chambers = getAllChambers($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>Название отделения</th>
            <th>Номер палаты</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($chambers); $i++) {       
                ?>
        <tr>
            <td><? echo  $chambers[$i]['id_chambers']?></td>
            <td><? echo  $chambers[$i]['department_name']?></td>
            <td><? echo  $chambers[$i]['number_chambers']?></td>
            <td>
                <a href="edit.php?id=<?echo $chambers[$i]['id_chambers']?>" class="btn btn-info">Редактировать</a>
                <a href="?delete=<?echo $chambers[$i]['id_chambers']?>" class="btn btn-danger">Удалить</a>
            </td>
        </tr>
    <?}?>
    </tbody>
</table>