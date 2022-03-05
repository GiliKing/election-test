

<?php

require 'database/connect.php';

$puName = "SELECT * FROM `polling_unit`";
$result = mysqli_query($conn, $puName);

if($result) {

    echo '<table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th>Polling Unit Name</th>
                        <th>Polling Unit Number</th>
                        <th>Click to show result</th>
                    </tr>

                </thead>
                <tbody>
            ';

    $i = 1;
    while( $row= mysqli_fetch_array($result, MYSQLI_ASSOC) )
    {
        $number = $row['polling_unit_number'];
        $name = $row['polling_unit_name'];
        $uniqueID = $row['uniqueid'];
        
        

        if($name != null) {

            echo'
            <tr>
            <td><p ="make_big">'.$i.'</p></td>
            <td><p ="make_big">'.$name.'</p></td>
            <td><p ="make_big">'.$number.'</p></td>
            <td>
            <input type="hidden" id="make'.$i.'" value='.$uniqueID.'>
            <button class="btn btn-primary btn-lg btn-block poll_btn'.$i.'">Show Result</button>
            <script>
                    document.querySelector(".poll_btn'.$i.'").addEventListener("click", () => {

                        let id = document.getElementById("make'.$i.'").value.trim();

                        $.ajax({
                            url:"../process/forms.php",
                            method: "POST",
                            data: {
                                ok: id,
                            },
                            success: function(data) {
                                if(data.trim() == "yes") {
                                    window.location.href = "PollingUnitResult.php?id='.base64_encode($uniqueID).'";
                                }
                            }
                        })
                    })
            </script>
            </td>
            </tr>
            ';

        }



        $i++;
    }

    echo "
        </tbody>
        </table>
    ";


}







?>