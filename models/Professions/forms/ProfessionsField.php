<div class="myform">
    <div class="myform__item">
        <label for="profession" class="form-label">Профессия</label>
        <input class="form-control" value="<?echo $profession?>" type="text" name="profession" id="profession" required>
    </div>
    <input type="hidden" name='id_update' value="<?echo $id?>">
    <div class="myform__item">
        <button class="btn btn-success">
            Отправить
        </button>
    </div>
</div>