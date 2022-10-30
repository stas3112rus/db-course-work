<div class="myform">
    <div class="myform__item">
        <label for="secondName" class="form-label">Фамилия</label>
        <input class="form-control" value="<?echo $second_name_patient?>" type="text" name="secondName" id="secondName" required>
    </div>
    <div class="myform__item">
        <label for="firstName" class="form-label">Имя</label>
        <input class="form-control" value="<?echo $first_name_patient?>" type="text" name="firstName" id="firstName" required>
    </div>
    <div class="myform__item">
        <label for="patronymicName" class="form-label">Отчество</label>
        <input class="form-control" value="<?echo $patronymic_name_patient?>" type="text" name="patronymicName" id="patronymicName">
    </div>
    <div class="myform__item">
        <label for="insurancePolicy" class="form-label">Страховой полис</label>
       
        <input class="form-control" value="<?echo $insurance_policy?>" type="text" name="insurancePolicy" id="insurancePolicy" minlength="7" maxlength="7" placeholder="АА9999А">
        <span style="color: grey; font-size: 60%">Формат: АА9999А</span>
        
    </div>
    <div class="myform__item">
        <label for="passport" class="form-label">Паспорт</label>
        
        <input class="form-control" value="<?echo $passport?>" name="passport" id="passport" type="number" minlength="10" maxlength="10">
        <span style="color: grey; font-size: 60%">Формат: 0000000000</span>
    </div>
    <div class="myform__item">
        <label for="allergy">Аллергия</label>
        <textarea name="allergy" class="form-control" placeholder="Внесите данные о аллергии пациента" id="allergy" style="height: 100px"><?echo $allergy?></textarea>
    </div>
    <input type="hidden" name='id_update' value="<?echo $id?>">
    <div class="myform__item">
        <button class="btn btn-success">
            Отправить
        </button>
    </div>

</div>