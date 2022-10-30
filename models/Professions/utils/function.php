<?
    function getAllProfessions($base){
        $sql = "SELECT 
                id_professions, profession 
                FROM `professions` 
                ORDER BY id_professions";
        $res = $base -> query($sql);
        $professions = $res ->fetch_all(MYSQLI_ASSOC);
        return $professions;
    }

    function getProfessionById($base, $id){
        $sql = "SELECT 
                profession 
                FROM `professions` 
                WHERE id_professions = '$id'";
         $res = $base -> query($sql);
         $profession = $res ->fetch_all(MYSQLI_ASSOC);

         return $profession;                
    }

    function insertProfession($base, $values){
        [$profession] = $values;

            $sql = "INSERT INTO `professions`
                (
                    `profession`
                ) VALUES 
                (
                    '$profession'
                )";
           if ($base -> query($sql)){
                return "OK";
           } else{
                return "Ошибка при внесении данных в базу: ". "<br>" . $base->error;
           }
    }

    function updateProfession($base, $values){
        [$id_update, $profession] = $values;

        $sql = "UPDATE `professions` SET 
                    `profession`='$profession'
                WHERE id_professions = '$id_update'
                ";
        if ($base -> query($sql)){
            return "OK";
           } else{
            return "Ошибка при обновлении данных в базу: ". "<br>" . $base->error;
           }
    }
?>