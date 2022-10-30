<?

    $data = [];
    
    if ($_POST['year']){
        $symptoms = $_POST['symptoms'];
        $year = $_POST['year'];

        $divider = $year == date("Y") ? date("m") : 12;

        $data = getCountYearSymptoms ($base, $symptoms, $year);
    }
?>

<div class="field">
    <h1 class="field__title">Среднемесячное количество пациентов по врачам</h1>
    <form method="post">
        <div class="wrapper">
            <div class="Search__symptoms">
                <label for="symptoms" class="form-label">Симптомом</label>
                <input class="form-control" value="<?echo $symptoms?>" type="text" name="symptoms" id="symptoms" required>

            </div>
            <div class="Search__year">
                <label for="year" class="form-label">Выберете год</label>
                <select required id="year" name="year" class="form-select">
                    <?
                        for ($i = 0; $i<30; $i++) { 
                    ?>
                        <option value='<?echo date("Y") - $i?>'
                        <? if ($year === date("Y") - $i) echo "selected"?>
                        >                       
                            <?echo date("Y") - $i?>
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
                    <th>ФИО Врача</th>
                    <th>Среднее количество обращений в месяц</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                for ($i = 0; $i<count($data); $i++) {       
                        ?>
                <tr>
                    <td><? echo                  
                        getFullName(
                        $data[$i]['first_name_doctor'], 
                        $data[$i]['second_name_doctor'], 
                        $data[$i]['patronymic_name_doctor']
                        )
                        ?></td>
                    <td><? echo  round($data[$i]['Count'] / $divider, 2)?></td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>

