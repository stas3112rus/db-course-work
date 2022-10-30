<?
    function getAllDoctors ($base) {
        $sql = "SELECT 
        `id_doctors`, 
        `first_name_doctor`, 
        `second_name_doctor`, 
        `patronymic_name_doctor`, 
        `proffesion_ref`,
        `profession`, 
        `chambers_ref`,
        `number_chambers`,
        `department_name`
        FROM `doctors`
        INNER JOIN professions ON proffesion_ref = id_professions
        INNER JOIN chambers ON chambers_ref = id_chambers
        INNER JOIN departments ON departments_ref  = id_departments
        ORDER BY second_name_doctor
    ";

        $res = $base -> query($sql);
        $doctors = $res ->fetch_all(MYSQLI_ASSOC);

        return $doctors;
    }

    function getDoctorById ($base,$id) {
        $sql = "SELECT 
        `id_doctors`, 
        `first_name_doctor`, 
        `second_name_doctor`, 
        `patronymic_name_doctor`, 
        `proffesion_ref`,
        `profession`, 
        `chambers_ref`,
        `number_chambers`,
        `department_name`
        FROM `doctors`
        INNER JOIN professions ON proffesion_ref = id_professions
        INNER JOIN chambers ON chambers_ref = id_chambers
        INNER JOIN departments ON departments_ref  = id_departments
        WHERE id_doctors = '$id'
    ";

        $res = $base -> query($sql);
        $doctor = $res ->fetch_all(MYSQLI_ASSOC);

        return $doctor;
    }

    function insertDoctor ($base, $values){

        [
            $first_name_doctor, 
            $second_name_doctor, 
            $patronymic_name_doctor, 
            $proffesion_ref, 
            $chambers_ref
        ] = $values;

        $sql = "INSERT INTO `doctors`
            (            
            `first_name_doctor`, 
            `second_name_doctor`, 
            `patronymic_name_doctor`, 
            `proffesion_ref`, 
            `chambers_ref`
            ) 
        VALUES 
            (          
            '$first_name_doctor', 
            '$second_name_doctor', 
            '$patronymic_name_doctor', 
            '$proffesion_ref', 
            '$chambers_ref'
            )";
        if ($base -> query($sql)){
            return "OK";
        } else{
            return "Ошибка при внесении данных в базу: ". "<br>" . $base->error;
        }
     
    }

    function updateDoctor ($base, $values){
        [   
            $id_update,
            $first_name_doctor, 
            $second_name_doctor, 
            $patronymic_name_doctor, 
            $proffesion_ref, 
            $chambers_ref
        ] = $values;
        
        $sql = "UPDATE `doctors` SET          
                `first_name_doctor`=' $first_name_doctor',
                `second_name_doctor`='$second_name_doctor',
                `patronymic_name_doctor`='$patronymic_name_doctor',
                `proffesion_ref`='$proffesion_ref',
                `chambers_ref`='$chambers_ref' 
            WHERE `id_doctors`='$id_update'";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при обновлении данных в базу: ". "<br>" . $base->error;
           }
    }
?>