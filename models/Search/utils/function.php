<?
    function getCountYearSymptoms ($base, $symptoms, $year){
        $dateStart = $year.'-01-01';
        $dateEnd = $year.'-12-31';

        $sql =  "SELECT first_name_doctor, second_name_doctor, patronymic_name_doctor,  COUNT(patient_ref) as Count
        FROM   `log_incoming`
        INNER JOIN doctors ON doctors_ref = id_doctors
        WHERE date_income BETWEEN '$dateStart' AND '$dateEnd' AND symptoms LIKE '%$symptoms%'
        GROUP BY doctors_ref";

        $res = $base -> query($sql);
        $data = $res ->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    function getPatientWithMaxCountRequest ($base, $proffesion){
        $sql = "SELECT first_name_patient, 	second_name_patient, patronymic_name_patient, COUNT(patient_ref) as Count FROM `log_incoming` 
        INNER JOIN doctors ON doctors_ref = id_doctors
        INNER JOIN professions ON proffesion_ref = id_professions
        INNER JOIN patients ON patient_ref  = id_patients
        WHERE id_professions = '$proffesion'
        GROUP BY patient_ref
        ORDER BY Count DESC
        LIMIT 10";

        $res = $base -> query($sql);
        $data = $res ->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    function getChamberWithMaxDays($base, $days){
        $sql = "CREATE TEMPORARY TABLE tempo
            SELECT  
                `number_chambers`, 
                `department_name`,  
                MAX(DATEDIFF(`date_outcome`, `date_income`)) as `max_day`  
            FROM `chambers`
            INNER JOIN doctors ON chambers_ref = id_chambers
            INNER JOIN departments ON departments_ref = id_departments
            INNER JOIN log_incoming ON doctors_ref = id_doctors
            GROUP BY number_chambers;     
            
        ";

        $res = $base -> query($sql);

        $sql = "SELECT 
            `number_chambers`, 
            `department_name`,  
            `max_day` 
        FROM tempo
        WHERE `max_day` < '$days'
        ";

        $res = $base -> query($sql);

        $data = $res ->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

?>