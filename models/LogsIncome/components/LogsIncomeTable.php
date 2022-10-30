<?
   $logs = getAllLogsIncome($base);
?>

<table class="table table-striped"">
    <thead>
        <tr>
            <th>ID записи</th>
            <th>ФИО пациента</th>
            <th>Страховой полис</th>
            <th>Паспорт</th>
            <th>Палата</th>
            <th>Отделение</th>
            <th>ФИО лечащего врача </th>
            <th>Диагноз </th>
            <th>Симптом</th>
            <th>Дата поступления</th>
            <th>Дата выписки</th>
            <th>Аллергия к препаратам </th>
            <th>Назначенные препараты </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($logs); $i++) {       
                ?>
    <tr>
        <td><? echo  $logs[$i]['id_log_incoming']?></td>
        <td>
            <?echo 
                getFullName(
                    $logs[$i]['first_name_patient'], 
                    $logs[$i]['second_name_patient'], 
                    $logs[$i]['patronymic_name_patient']
                ) 
            ?>
        </td>
        <td><? echo  $logs[$i]['insurance_policy']?></td>
        <td><? echo  $logs[$i]['passport']?></td>
        <td><? echo  $logs[$i]['number_chambers']?></td>
        <td><? echo  $logs[$i]['department_name']?></td>
        <td>
            <?echo 
                getFullName(
                    $logs[$i]['first_name_doctor'], 
                    $logs[$i]['second_name_doctor'], 
                    $logs[$i]['patronymic_name_doctor']
                ) ?> 
        </td>
        <td><? echo $logs[$i]["diagnosis"]?> </td>
        <td><? echo $logs[$i]["symptoms"]?></td>
        <td><? echo $logs[$i]["date_income"]?></td>
        <td><? echo $logs[$i]["date_outcome"]?>
                    
        </td>
        <td><? echo $logs[$i]["allergy"]?></td>
        <td><? echo $logs[$i]["drugs"]?></td>
        <td>
            <a href="./pages/logsincome/edit.php?id=<?echo $logs[$i]['id_log_incoming']?>" class="btn btn-info">Редактировать</a>
            <a href="/?delete=<?echo $logs[$i]['id_log_incoming']?>" class="btn btn-danger">Удалить</a>
        </td>
    </tr>
    <?}?>
    </tbody>
</table>