<?
    function getAllLogsIncome ($base) {
        $sql = "SELECT
        id_log_incoming,
        patient_ref,
        first_name_patient, 
        second_name_patient, 
        patronymic_name_patient,
        insurance_policy,
        passport,
        number_chambers,
        department_name,
        first_name_doctor,
        second_name_doctor,
        patronymic_name_doctor,
        diagnosis, 
        symptoms, 
        date_income,
        date_outcome,
        allergy,
        drugs 
    FROM `log_incoming` 
    INNER JOIN patients ON patient_ref = id_patients
    INNER JOIN doctors ON doctors_ref = id_doctors
    INNER JOIN chambers ON chambers_ref = id_chambers
    INNER JOIN departments ON departments_ref = id_departments
    ORDER BY id_log_incoming DESC
    ";

        $res = $base -> query($sql);
        $logs = $res ->fetch_all(MYSQLI_ASSOC);

        return $logs;
    }

    function getLogsIncomeById ($base,$id) {
        $sql = "SELECT
        id_log_incoming,
        patient_ref,
        first_name_patient, 
        second_name_patient, 
        patronymic_name_patient,
        insurance_policy,
        passport,
        number_chambers,
        department_name,
        doctors_ref,
        first_name_doctor,
        second_name_doctor,
        patronymic_name_doctor,
        diagnosis, 
        symptoms, 
        date_income,
        date_outcome,
        allergy,
        drugs 
    FROM `log_incoming` 
    INNER JOIN patients ON patient_ref = id_patients
    INNER JOIN doctors ON doctors_ref = id_doctors
    INNER JOIN chambers ON chambers_ref = id_chambers
    INNER JOIN departments ON departments_ref = id_departments
    WHERE id_log_incoming = '$id'
    ";

        $res = $base -> query($sql);
        $log = $res ->fetch_all(MYSQLI_ASSOC);

        return $log;
    }  

    function insertLogIncome($base, $values){

        [$patient, $doctor, $date_income, $date_outcome, $symptoms, $diagnosis, $drugs] = $values;

        $date_income =  !empty($date_income) ? "'".$date_income."'" : 'null';
        $date_outcome =  !empty($date_outcome) ?  "'".$date_outcome."'" : 'null';

            $sql = "INSERT INTO `log_incoming`
                (
                    `patient_ref`, 
                    `doctors_ref`, 
                    `date_income`,
                    `date_outcome`,
                    `symptoms`,
                    `diagnosis`,
                    `drugs`
                ) VALUES 
                (
                    '$patient', 
                    '$doctor', 
                    $date_income,
                    $date_outcome,
                    '$symptoms',
                    '$diagnosis',
                    '$drugs'
                )";
           if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при внесении данных в базу: ". "<br>" . $base->error;
           }
     
    }

    function updateLogIncome($base, $values){
        [$id_update, $patient, $doctor, $date_income, $date_outcome, $symptoms, $diagnosis, $drugs] = $values;

        $date_income =  !empty($date_income) ? "'".$date_income."'" : 'null';
        $date_outcome =  !empty($date_outcome) ?  "'".$date_outcome."'" : 'null';

        $sql = "UPDATE `log_incoming` SET 
                    `patient_ref`='$patient',
                    `doctors_ref`='$doctor',
                    `date_income`=$date_income,
                    `date_outcome`=$date_outcome,
                    `symptoms`='$symptoms',
                    `diagnosis`='$diagnosis',
                    `drugs`='$drugs'
                WHERE id_log_incoming = '$id_update'
                ";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при обновлении данных в базу: ". "<br>" . $base->error;
           }
    }

    function isPatientInHospital($base, $patient, $date_income, $date_outcome){
        if (!$date_outcome){ 
            $sql = "SELECT COUNT(*) AS patientCount
            FROM log_incoming
            WHERE 
                date_income >= '$date_income' AND
                patient_ref = '$patient'
            "; 
        } else {
            $sql = "SELECT COUNT(*) AS patientCount
            FROM log_incoming
            WHERE  
            (
                date_income BETWEEN '$date_income' AND '$date_outcome' OR 
                date_outcome BETWEEN '$date_income' AND '$date_outcome' OR
                (date_income < '$date_income' AND date_outcome > '$date_outcome') OR
                (date_income > '$date_outcome' AND date_outcome IS NULL)) AND
            (patient_ref = '$patient')
            "; 
        }

        $res = $base -> query($sql);
        $row = $res->fetch_assoc();      
        $row['patientCount'];

        if ($row['patientCount'] == 0 ){
            return "OK";
        } else {
            return "Пациент находится в эти даты в больнице";
        }
    }
?>

