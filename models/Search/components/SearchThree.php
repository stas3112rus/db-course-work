<?
$data = [];

if ($_POST['days']){
    $days = $_POST['days'];

    $data = getChamberWithMaxDays($base, $days);
}

?>

<div class="field">
    <h1 class="field__title">Поиск палат с максимальным количество дней пребывания</h1>
    <form method="post">
        <div class="wrapper">
            <div class="Search__days">
                <label for="days" class="form-label">Максимальное количество дней</label>
                <input class="form-control" value="<?echo $days?>" type="number" name="days" id="days" required>

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
            <th>Отделение и палата</th>
            <th>Максимальное количество дней пребывания</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        for ($i = 0; $i<count($data); $i++) {       
                ?>
        <tr>
            <td>
                <?echo 
                    $data[$i]['department_name'].
                    " отделение. Палата: ".
                    $data[$i]['number_chambers']?>
            </td>
            <td><?echo $data[$i]['max_day']?></td>
        </tr>
    <?}?>
    </tbody>
</table>
</div>

