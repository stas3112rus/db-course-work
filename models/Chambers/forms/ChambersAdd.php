<?
     $number_chambers = $_POST['chamber'];

     if ($number_chambers){
        
        $departments_ref = $_POST['department'];

        $error= [];
       
        if (!$error){
          
            $resInsert = 
            [   
                $departments_ref,
                $number_chambers               
            ];
            
            $req = insertChamber($base, $resInsert);

            if ($req == "OK"){
                
                $id = getMaxInCol($base, 'chambers', 'id_chambers');
                $newURL = 'edit.php?id='.$id."&successesAdd=true";
                header('Location: '.$newURL);
            } else {
                array_push($error, $req);
            }
        }
     }     
?>

<div class="field">
    <h1 class="field__title">Добавить новую больничную палату</h1>
    <?
        if (!empty($error)) showErrors ($error)
    ?>
    <form method="post">
        <?include ('ChambersField.php')?>
    </form>

</div>