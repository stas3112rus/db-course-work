<?
    $departments = getAllDepartments ($base);
?>

<div class="myform">
    <div class="myform__item">
        <label for="department" class="form-label">Выберете отделение</label>
        <select required id="department" name="department" class="form-select">
            <option value=""></option>  
            <?
                    for ($i = 0; $i<count($departments); $i++) { 
            ?>
                <option 
                    <?
                        if ($departments_ref==$departments[$i]['id_departments']) echo "selected" ?> 
                        value='<?echo $departments[$i]['id_departments']?>'
                    >
                    <?echo $departments[$i]['department_name']?>                   
                </option>
            <?}?>
        </select>
    </div>
    <div class="myform__item">
        <label for="chamber" class="form-label">Номер палаты</label>
        <input class="form-control" value="<?echo $number_chambers?>" type="number" name="chamber" id="chamber" required>
    </div>
    <div>
        <input type="hidden" name='id_update' value="<?echo $id?>">
        <button class="btn btn-success">
            Отправить
        </button>
    </div>

</div>