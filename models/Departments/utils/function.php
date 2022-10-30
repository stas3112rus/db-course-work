<?
    function getAllDepartments ($base) {
        $sql = "SELECT 
        id_departments,
        department_name
        FROM `departments`
        ORDER BY `id_departments`";

        $res = $base -> query($sql);
        $departments = $res ->fetch_all(MYSQLI_ASSOC);

        return $departments;
    }

    function getDepartmentById ($base,$id) {
        $sql = "SELECT 
            `id_departments`, 
            `department_name` 
            FROM `departments` 
            WHERE id_departments = '$id' 
            ORDER BY `id_departments`
            ";

        $res = $base -> query($sql);
        $department = $res ->fetch_all(MYSQLI_ASSOC);

        return $department;
    }

    function insertDepartment($base, $values){

        [$department_name] = $values;

        $sql = "INSERT INTO `departments`
        (
            `department_name`
        ) VALUES 
        (
            '$department_name'
        )";
        if ($base -> query($sql)){
            return "OK";
        } else{
            echo "Ошибка при внесении данных в базу: " . $sql . "<br>" . $base->error;
        }
     
    }

    function updateDepartment($base, $values){
        [$id_update, $department_name] = $values;
        
        $sql = "UPDATE `departments` SET 
        `department_name`='$department_name'
        WHERE id_departments  = '$id_update'";
        if ($base -> query($sql)){
            return "OK";
           } else{
            echo "Ошибка при обновлении данных в базу: " . $sql . "<br>" . $base->error;
           }
    }
?>