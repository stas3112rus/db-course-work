<?
   $professions = getAllProfessions($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>Название профессии</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($professions); $i++) {       
                ?>
    <tr>
        <td><? echo  $professions[$i]['id_professions']?></td>
        <td><? echo  $professions[$i]['profession']?></td>
        
        <td>
            <a href="./edit.php?id=<?echo $professions[$i]['id_professions']?>" class="btn btn-info">Редактировать</a>
            <a href="?delete=<?echo $professions[$i]['id_professions']?>" class="btn btn-danger">Удалить</a>
        </td>
    </tr>
    <?}?>
    </tbody>
</table>