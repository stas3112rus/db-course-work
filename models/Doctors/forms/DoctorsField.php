<?
    $proffesions = getAllProfessions($base);
    $freeChambers = getFreeChambers($base);
    
    if ($chambers_ref){
        $curents_chamber =  getChamberById ($base, $chambers_ref);
    }
?>

<div class="myform">
    <div class="myform__item">
        <label for="secondName" class="form-label">Фамилия</label>
        <input class="form-control" value="<?echo $second_name_doctor?>" type="text" name="secondName" id="secondName" required>
    </div>
    <div class="myform__item">
        <label for="firstName" class="form-label">Имя</label>
        <input class="form-control" value="<?echo $first_name_doctor?>" type="text" name="firstName" id="firstName" required>
    </div>
    <div class="myform__item">
        <label for="patronymicName" class="form-label">Отчество</label>
        <input class="form-control" value="<?echo $patronymic_name_doctor?>" type="text" name="patronymicName" id="patronymicName">
    </div>
    <div class="myform__item">
        <label for="proffesion" class="form-label">Профессия</label>
        <select required id="proffesion" name="proffesion" class="form-select">
            <option value=""></option>  
            <?
                    for ($i = 0; $i<count($proffesions); $i++) { 
            ?>
                <option 
                    <?
                        if ($proffesion_ref ==$proffesions[$i]['id_professions']) echo "selected" ?> 
                        value='<?echo $proffesions[$i]['id_professions']?>'
                    >
                    <?echo $proffesions[$i]['profession']?>                   
                </option>
            <?}?>
        </select>
    </div>
    <div class="myform__item">
        <label for="chamber" class="form-label">Палата и отделение</label>
        <select required id="chamber" name="chamber" class="form-select">
            <option value=""></option>
            
            <?php
                if ($curents_chamber){ 
            ?>
                <option selected value="<? echo $curents_chamber[0]['id_chambers']?>">
                    
                <?echo "Палата ".
                    $curents_chamber[0]['number_chambers']. 
                    " отд.".
                    $curents_chamber[0]['department_name'];
                ?>                   
                </option>
            <?}?>
            <?
                    for ($i = 0; $i<count($freeChambers); $i++) { 
            ?>
                <option 
                    value='<?echo $freeChambers[$i]['id_chambers']?>'
                >
                <?echo 
                    "Палата ".
                    $freeChambers[$i]['number_chambers']. 
                    " отд.".
                    $freeChambers[$i]['department_name'];
                ?>                      
                </option>
            <?}?>
        </select>
    </div>
    <input type="hidden" name='id_update' value="<?echo $id?>">
    <div class="myform__item">
        <button class="btn btn-success">
            Отправить
        </button>
    </div>

</div>