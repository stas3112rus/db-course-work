<?
    $patients = getAllPatients($base);
    $doctors = getAllDoctors($base);
?>

<div class="myform">
    
        <div class="myform__item">
            <label for="patient" class="form-label">Выберете пациента</label>
            <select required id="patient" name="patient" class="form-select">
                <option value=""></option>  
                <?
                     for ($i = 0; $i<count($patients); $i++) { 
                ?>
                    <option 
                        <?
                            if ($patient==$patients[$i]['id_patients']) echo "selected" ?> 
                            value='<?echo $patients[$i]['id_patients']?>'
                        >
                       
                        <?                
                          echo  getFullName(
                            $patients[$i]['first_name_patient'], 
                            $patients[$i]['second_name_patient'], 
                            $patients[$i]['patronymic_name_patient']
                          ) 
                        ?>
                    </option>
                <?}?>
            </select>
        </div>
        <div class="myform__item">
            <label for="doctor" class="form-label">Назначьте врача</label>
            <select required id="doctor" name="doctor" class="form-select">
                <option value=""></option>  
                <?
                     for ($i = 0; $i<count($doctors); $i++) { 
                ?>
                    <option 
                    
                    <?
                            if ($doctor==$doctors[$i]['id_doctors']) echo "selected" ?> 
                            value='<?echo $doctors[$i]['id_doctors']?>'
                    >                      
                        <?                
                          echo  getFullName(
                            $doctors[$i]['first_name_doctor'], 
                            $doctors[$i]['second_name_doctor'], 
                            $doctors[$i]['patronymic_name_doctor']
                          ) 
                        ?>
                    </option>
                <?}?>
            </select>
        </div>
        <div class="myform__item">
            <label for="dateIncome" class="form-label">Дата поступления</label>
            <input class="form-control" value="<?echo $date_income?>" type="date" name="dateIncome" id="dateIncome" required>
        </div>
        <div class="myform__item">
            <label for="dateOutcome" class="form-label">Дата выписки</label>
            <input class="form-control" value="<?echo $date_outcome?>" type="date" name="dateOutcome" id="dateOutcome">
        </div>           
        <div class="myform__item">
            <label for="symptoms">Симптомы</label>
            <textarea name="symptoms" class="form-control" placeholder="Внесите симптомы" id="symptoms" style="height: 100px" required><?echo $symptoms?></textarea>
        </div>
        <div class="myform__item">
            <label for="diagnosis">Диагноз</label>
            <textarea name="diagnosis" class="form-control" placeholder="Внесите диагноз пациента" id="diagnosis" style="height: 100px"><?echo $diagnosis?></textarea>
        </div>
        <div class="myform__item">
            <label for="drugs">Лечение и препараты</label>
            <textarea name="drugs" class="form-control" placeholder="Внесите лечение и препараты" id="drugs" style="height: 100px"><?echo $drugs?></textarea>
        </div>
        <input type="hidden" name='id_update' value="<?echo $id?>">
        <div class="myform__item">
            <button class="btn btn-success">
                Отправить
            </button>
        </div>

</div>