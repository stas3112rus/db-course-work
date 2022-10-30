<?
    function getAllChambers ($base) {
        $sql = "SELECT 
            `id_chambers`, 
            `departments_ref`,
            `department_name`, 
            `number_chambers`           
            FROM `chambers`
            INNER JOIN departments ON departments_ref = id_departments
            ORDER BY `id_chambers` DESC
        ";

        $res = $base -> query($sql);
        $chambers = $res ->fetch_all(MYSQLI_ASSOC);

        return $chambers;
    }

    function getChamberById ($base,$id) {
        $sql = "SELECT 
        `id_chambers`, 
        `departments_ref`,
        `department_name`, 
        `number_chambers` 
        FROM `chambers`
        INNER JOIN departments ON departments_ref = id_departments
        WHERE `id_chambers` = '$id'
        ORDER BY `id_chambers` DESC";

        $res = $base -> query($sql);
        $chamber = $res ->fetch_all(MYSQLI_ASSOC);

        return $chamber;
    }

    function insertChamber($base, $values){

        [
            $departments_ref, 
            $number_chambers
        ] = $values;

        $sql = "INSERT INTO `chambers`
        (
            `departments_ref`, 
            `number_chambers`           
        ) VALUES 
        (
            '$departments_ref',
            '$number_chambers'
        )";
        if ($base -> query($sql)){
            return "OK";
        } else{
            return "Ошибка при внесении данных в базу: ". "<br>" . $base->error;
        }
     
    }

    function updateChamber($base, $values){
        [
            $id_update,
            $departments_ref,
            $number_chambers
        ] = $values;
        
        $sql = "
            UPDATE `chambers` SET 
            `departments_ref`='$departments_ref',
            `number_chambers`='$number_chambers'
            WHERE id_chambers  = '$id_update'
        ";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при обновлении данных в базу: ". "<br>" . $base->error;
           }
    }

    function getFreeChambers($base){
        $sql = "SELECT 
                    `id_chambers`, 
                    `departments_ref`,
                    `department_name`,
                    `number_chambers`
                FROM chambers
                INNER JOIN departments 
                    ON departments_ref = id_departments
                LEFT JOIN doctors 
                    ON id_chambers = chambers_ref 
                WHERE doctors.chambers_ref IS NULL
        ";

        $res = $base -> query($sql);
        $chambers = $res ->fetch_all(MYSQLI_ASSOC);

        return $chambers;
    }
?>