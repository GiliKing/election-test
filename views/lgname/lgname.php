

<?php


require '../database/connect.php';


if($conn) {

    session_start();

    $puName = "SELECT * FROM `lga`";
    $result = mysqli_query($conn, $puName);

    if($result) {

        echo '
        <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink"  data-toggle="dropdown" aria-expanded="false">
            <span id="ask">Select The Local Government Area</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        ';

        $i = 0;
        while( $row= mysqli_fetch_array($result, MYSQLI_ASSOC) )
        {
            $id = $row['lga_id'];
            $name_row = $row['lga_name'];
            $description = $row['lga_description'];
            
            

            if($name_row != null) {

                echo'
                <a class="dropdown-item" id="my_btn'.$i.'" href="#">'.$name_row.'</a>
                <input type="hidden" id="v3'.$i.'" value='.$name_row.'>
                <input type="hidden" id="v1'.$i.'" value='.$id.'>
                <input type="hidden" id="v2'.$i.'" value='.$description.'>
                <script>
                    

                    document.getElementById("my_btn'.$i.'").addEventListener("click", () => {
                        let num1 = document.getElementById("v1'.$i.'").value.trim();
                        let num2 = document.getElementById("v2'.$i.'").value.trim();

                        document.getElementById("index1_input1").value = "";
                        document.getElementById("index1_input2").value = "";


                        document.getElementById("index1_input1").value = num1;
                        document.getElementById("index1_input2").value = num2;

                        
                            $.ajax({
                                url:"../process/forms.php",
                                method: "POST",
                                data: {
                                    name: document.getElementById("v3'.$i.'").value.trim(),
                                    lgdes: document.getElementById("index1_input2").value.trim(),
                                    lgid: document.getElementById("index1_input1").value.trim()
                                },
                                success: function(data) {

                                    if(data.trim() == "yes") {
                                        window.location.href = "../views/lgresult/lgresult.php?id='.base64_encode($id).'";
                                    }

                                },
                            })

                          
                    })
                    
                </script>
                ';

            }



            ++$i;
        }

        echo "
        </div>
        </div>
        ";

        

    }


}







?>