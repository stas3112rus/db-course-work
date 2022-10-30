<?
    function getAllPatients ($base) {
        $sql = "SELECT
        id_patients ,
        first_name_patient, 
        second_name_patient, 
        patronymic_name_patient,
        insurance_policy,
        passport,       
        allergy
    FROM `patients` 
    ORDER BY id_patients DESC";

        $res = $base -> query($sql);
        $patients = $res ->fetch_all(MYSQLI_ASSOC);

        return $patients;
    }

    function getPatientById ($base,$id) {
        $sql = "SELECT
        id_patients ,
        first_name_patient, 
        second_name_patient, 
        patronymic_name_patient,
        insurance_policy,
        passport,        
        allergy
    FROM `patients`
    WHERE id_patients='$id'";

        $res = $base -> query($sql);
        $patient = $res ->fetch_all(MYSQLI_ASSOC);

        return $patient;
    }

    function insertPatient($base, $values){
       
        [
            $first_name_patient,
            $second_name_patient,
            $patronymic_name_patient,
            $insurance_policy,
            $passport,
            $allergy
        ] = $values;
           
        $sql = "INSERT INTO `patients`
        (
            `first_name_patient`,
            `second_name_patient`,
            `patronymic_name_patient`,
            `insurance_policy`,
            `passport`,
            `allergy`
        ) VALUES 
        (
            '$first_name_patient',
            '$second_name_patient',
            '$patronymic_name_patient',
            '$insurance_policy',
            '$passport',
            '$allergy'
        )";
        if ($base -> query($sql)){
            return "OK";
        } else{
            return "Ошибка при внесении данных в базу: ". "<br>" . $base->error;
        }
     
    }

    function updatePatient($base, $values){
        [ 
            $id_update,
            $first_name_patient,
            $second_name_patient,
            $patronymic_name_patient,
            $insurance_policy,
            $passport,
            $allergy
        ] = $values;
        
        $sql = "
            UPDATE `patients` SET 
            `first_name_patient`='$first_name_patient',
            `second_name_patient`='$second_name_patient',           
            `patronymic_name_patient`='$patronymic_name_patient',
            `insurance_policy`='$insurance_policy',
            `passport`='$passport',
            `allergy`='$allergy'
            WHERE id_patients  = '$id_update'
        ";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при обновлении данных в базу: ". "<br>" . $base->error;
           }
    }
?>