

<?php


if(isset($_POST['ok'])) {

    require '../database/connect.php';

    $id = htmlspecialchars(trim($_POST['ok']), ENT_QUOTES);
    $id_real = mysqli_real_escape_string($conn, $id);

    $result = "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = '$id_real'";

    $result_check = mysqli_query($conn, $result);

    if($result_check)  {
        // if polling unit ext
        echo "yes";
    } 

    
}


if(isset($_POST['name'])) {
    require '../database/connect.php';

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
    $lgid = htmlspecialchars(trim($_POST['lgid']), ENT_QUOTES);
    $lgdes = htmlspecialchars(trim($_POST['lgdes']), ENT_QUOTES);

    $name_real = mysqli_real_escape_string($conn, $name);
    $lgid_real = mysqli_real_escape_string($conn, $lgid);
    $lgdes_real = mysqli_real_escape_string($conn, $lgdes);

    $result = "SELECT `polling_unit_id` FROM `polling_unit` WHERE `lga_id` = '$lgid_real'";

    $result_check = mysqli_query($conn, $result);

    if($result_check)  {

            $mmm = array();


            $i = 0;
            while( $row= mysqli_fetch_array($result_check, MYSQLI_ASSOC) ) {

                $id[] = $row['polling_unit_id'];

                $again = "SELECT SUM(`party_score`) AS 'total' FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = ".$id[$i]."";

                $again_check = mysqli_query($conn, $again);


                if($again_check) {

                    $row = mysqli_fetch_object($again_check);

                    array_push($mmm, $row->total);
                }

            ++$i;
            }

            $answer = array_sum($mmm);

            session_start();
            
            $_SESSION['description'] = $lgdes_real;
            $_SESSION['total'] = $answer;

            echo "yes";

            
    } 
    
}





?>