

<link rel="stylesheet" href="resources/css/bootstrap.min.css">

<link rel="stylesheet" href="resources/css/mystyle.css">

<?php

$id = $_GET['id'];

$id_real = base64_decode($id);

if(!empty($id) || $id != null) {

    require 'database/connect.php';

    if($conn) {

        $id_again = mysqli_real_escape_string($conn, $id_real);

        $result = "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = '$id_again'";

        $result_check = mysqli_query($conn, $result);

        if($result_check)  {
            // if polling unit exit
            echo'
            <!-- Polling unit card -->
            <div class="container-fluid">
            <div class="card">
                <div class="card-header header_cl">
                    <h1 id="header_txt">This is the result for Polling Unit '.$id_again.' in Delta State Local Goverment</h1>
                </div>
    
                <div class="card-body cb">

                <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th>Party Abbreviation</th>
                        <th>Party Score</th>
                        <th>Polling Unit Result</th>
                    </tr>

                </thead>
                <tbody>
            ';

            $i = 1;
            while( $row= mysqli_fetch_array($result_check, MYSQLI_ASSOC) )
            {
                $party = $row['party_abbreviation'];
                $score = $row['party_score'];
                $show = $row['result_id'];
                
                

                if($party != null) {

                    echo'
                    <tr>
                    <td><p ="make_big">'.$i.'</p></td>
                    <td><p ="make_big">'.$party.'</p></td>
                    <td><p ="make_big">'.$score.'</p></td>
                    <td><p ="make_big">'.$show.'</p></td>
                    </tr>
                    ';
                }

                ++$i;
            }

            
            echo "
            </tbody>
            </table>
            </div>
            </div>
            </div>
            ";
        }
    }
} else {

    echo '
    <div class="container-fluid">
    <div class="card">
        <div class="card-header header_cl">
            <h1 id="header_txt">Server Error</h1>
        </div>

        <div class="card-body cb">
            <hr>
            <p>405 Page not Found Or Method Not Allowwed. Reload or check your network</p>
        </div>
    </div>
    </div>
    ';
}













?>