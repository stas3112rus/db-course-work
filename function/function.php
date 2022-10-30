<?
    function getFullName($firstName, $seconName, $patronymic_name){
        if ($patronymic_name) {
            return $firstName." ".$patronymic_name." ".$seconName;
        } else{
            return $firstName." ".$seconName;
        }
    }

    function getMaxInCol ($base, $table, $col){
        $sqlMaxId = "SELECT MAX($col) FROM $table";
        $resMaxID = $base -> query($sqlMaxId);
        $result =$resMaxID ->fetch_all(MYSQLI_ASSOC)[0]["MAX($col)"];

        return $result;
    }

    function deleteRow($base, $table, $idName, $id){
        $sql = "DELETE FROM `$table` WHERE $idName = '$id'";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при удалении данных в базу: ". "<br>" . $base->error;
           }
    }

    function checkInsuarancePolice($police){
        if (iconv_strlen($police) !== 7) {
            $error = "Количество символов страхового полиса не корректное ";
            return $error;
        }

        if (!isRuChar(mb_substr($police, 0, 2))) {
            $error = "Формат введенного полиса не корректный";
            return $error;
        }

        if (!isRuChar(mb_substr($police, 6, 1))) {
            $error = "Формат введенного полиса не корректный";
            return $error;
        }

        if (!is_numeric(mb_substr($police, 2, 4))) {
            $error = "Формат введенного полиса не корректный";
            return $error;
        }

        return "OK";
    }

    function checkPassport($passport){
        if (iconv_strlen($passport) !== 10) {
            $error = "Количество символов паспорта не корректное ";
            return $error;
        }

        if (!is_numeric(mb_substr($passport, 0, 10))) {
            $error = "Формат введенного паспорта не корректный";
            return $error;
        }

        return "OK";
    }

    function checkDates($dateIncome, $dateOutcome){
        if (!empty($dateOutcome)){
            if (strtotime($dateIncome) >= strtotime($dateOutcome)){
                $error = "Дата поступления должна быть меньше даты выписки";
                return $error;
            }
        }

        return "OK";        
    }

    function isRuChar($text){        
        return preg_match('/[А-Яа-яЁё]/u', $text);
    }


    function showErrors ($error){    

        for ($i=0; $i<count($error); $i++){
            echo '<button type="button" class="btn btn-danger">
            '.$error[$i].'</button> <br><br>';
        }
    }
?>