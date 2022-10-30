<?
   $patients = getAllPatients($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>ФИО пациента</th>
            <th>Страховой полис</th>
            <th>Паспорт</th>
            <th>Аллергия</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($patients); $i++) {       
                ?>
    <tr>
        <td><? echo  $patients[$i]['id_patients']?></td>
        <td>
            <?echo 
                getFullName(
                    $patients[$i]['first_name_patient'], 
                    $patients[$i]['second_name_patient'], 
                    $patients[$i]['patronymic_name_patient']
                ) 
            ?>
        </td>
        <td>
            <? echo  $patients[$i]['insurance_policy']?>
        </td>
        <td><? echo  $patients[$i]['passport']?></td>  
        <td><? echo  $patients[$i]['allergy']?></td> 
        <td>
            <a href="edit.php?id=<?echo $patients[$i]['id_patients']?>" class="btn btn-info">Редактировать</a>
            <a href="?delete=<?echo $patients[$i]['id_patients']?>" class="btn btn-danger">Удалить</a>
        </td>
    </tr>
    <?}?>
    </tbody>
</table>