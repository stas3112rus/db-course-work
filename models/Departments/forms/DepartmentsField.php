<div class="myform">
    <div class="myform__item">
        <label for="departmentName" class="form-label">Название отделение<?echo $department_name?></label>
        <input class="form-control" value="<?echo $department_name?>" type="text" name="departmentName" id="departmentName" required>
    </div>
    <input type="hidden" name='id_update' value="<?echo $id?>">
    <div class="myform__item">
        <button class="btn btn-success">
            Отправить
        </button>
    </div>
</div>