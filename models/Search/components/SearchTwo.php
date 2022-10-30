<?

    $data = [];

    $proffesions = getAllProfessions($base);

    if ($_POST['proffesion']){

        $proffesion = $_POST['proffesion'];

        $data =  getPatientWithMaxCountRequest ($base, $proffesion);
    }



?>

<div class="field">
<h1 class="field__title">10 пациентов которые чаще всего обращаются к врачу</h1>
<form method="post">
    <div class="wrapper">
        <div class="Search__proffesion">
            <label for="proffesion" class="form-label">Профессия врача</label>
            <select required id="proffesion" name="proffesion" class="form-select">
                <option value=""></option>  
                <?
                        for ($i = 0; $i<count($proffesions); $i++) { 
                ?>
                    <option 
                        <?
                            if ($proffesion ==$proffesions[$i]['id_professions']) echo "selected" ?> 
                            value='<?echo $proffesions[$i]['id_professions']?>'
                        >
                        <?echo $proffesions[$i]['profession']?>                   
                    </option>
                <?}?>
            </select>
        </div>
        <div class="myform__item">
            <button class="btn btn-success">
                Отправить
            </button>
        </div>
    </div>
</form>
<div class="field__table">
    <table class="table table-striped"">
        <thead>
            <tr>
                <th>ФИО Пациента</th>
                <th>Колличество обращений</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            for ($i = 0; $i<count($data); $i++) {       
                    ?>
            <tr>
                <td><? echo                  
                    getFullName(
                    $data[$i]['first_name_patient'], 
                    $data[$i]['second_name_patient'], 
                    $data[$i]['patronymic_name_patient']
                    )
                    ?>
                </td>
                <td><? echo $data[$i]['Count'] ?></td>
            </tr>
        <?}?>
        </tbody>
    </table>
</div>

