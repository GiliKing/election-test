

<link rel="stylesheet" href="../resources/css/bootstrap.min.css">

<link rel="stylesheet" href="../resources/css/mystyle.css">

<?php

$id = $_GET['id'];

$id_real = base64_decode($id);

if(!empty($id) || $id != null) {

    require '../../database/connect.php';

    if($conn) { 

        $lgName = "SELECT `lga_name` AS 'name' FROM `lga` WHERE `lga_id` = '$id_real'";
        $result = mysqli_query($conn, $lgName);

        if($result) {

            $row = mysqli_fetch_object($result);

            $name = $row->name;

            session_start();

            $description = $_SESSION['description'];

            $total = $_SESSION['total'];

                    echo'
                <!-- Polling unit card -->
                <div class="container-fluid">
                <div class="card">
                    <div class="card-header header_cl">
                        <h1 id="header_txt">This is the result for Total Polling Units in '.$name.' local Government Delta State</h1>
                    </div>

                    <div class="card-body cb">

                    <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Local Government Name</th>
                            <th>Local Government Description</th>
                            <th>Total Polling Result</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1</td>
                        <td>'.$name.'</td>
                        <td>'.$description.'</td>
                        <td>'.$total.'</td>
                    </tr>

                    </tbody>
                    </table>
                '; 
        }


           
    }

}




?>