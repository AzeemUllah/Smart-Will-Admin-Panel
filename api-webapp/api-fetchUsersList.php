<?php
include "config.php";
session_start();
$toReturn = '';

$sql = 'SELECT * FROM `users`';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['current_working_class'] != "submission") {
            $toReturn .= '<tr class="warning">
                                                    <td class="text-center">' . $row['id'] . '</td>
                                                    <td>' . $row['user_name'] . '</td>
                                                    <td>' . $row['email'] . '</td>
                                                    <td>' . $row['current_working_class'] . '</td>
                                                   
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['solicitor'] . '</td>
                                                  
                                                    <td class="td-actions text-center">
                                                        ';


            $toReturn .= '       <button type="button" rel="tooltip" class="btn btn-warning btn-round" onclick="details(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">person</i>
                                                                                                    </button>     
             <button type="button" rel="tooltip" class="btn btn-info btn-round" onclick="generatePdf(\'' . $row['id'] . '\')">
                                                                                                    <i class="material-icons">description</i>
                                                                                                </button>
                                                                                             
                                                                                                ';



            $toReturn .= ' </td>
                                                        </tr>';
        } else {
            $toReturn .= '<tr>
                                                    <td class="text-center">' . $row['id'] . '</td>
                                                    <td>' . $row['user_name'] . '</td>
                                                    <td>' . $row['email'] . '</td>
                                                    <td>' . $row['current_working_class'] . '</td>
                                                   
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['solicitor'] . '</td>
                                                  
                                                    <td class="td-actions text-center">
                                                        ';

            $toReturn .= '            <button type="button" rel="tooltip" class="btn btn-warning btn-round" onclick="details(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">person</i>
                                                                                                    </button>
                                                                                                     <button type="button" rel="tooltip" class="btn btn-info btn-round" onclick="generatePdf(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">description</i>
                                                                                                    </button>
                                     
                                                                                                    ';

            $toReturn .= '   </td>
                                                      </tr>';
        }
    }

}
else{
    echo "0";
    return;
}


echo $toReturn;

$conn->close();

$toReturn = '';

$sql = 'SELECT * FROM `users`';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['current_working_class'] != "submission") {
            $toReturn .= '<tr class="warning">
                                                    <td class="text-center">' . $row['id'] . '</td>
                                                    <td>' . $row['user_name'] . '</td>
                                                    <td>' . $row['email'] . '</td>
                                                    <td>' . $row['current_working_class'] . '</td>
                                                   
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['solicitor'] . '</td>
                                                  
                                                    <td class="td-actions text-center">
                                                        ';


                                                        $toReturn .= '           <button type="button" rel="tooltip" class="btn btn-warning btn-round" onclick="details(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">person</i>
                                                                                                    </button>
                                                                                                      <button type="button" rel="tooltip" class="btn btn-info btn-round" onclick="generatePdf(\'' . $row['id'] . '\')">
                                                                                                    <i class="material-icons">description</i>
                                                                                                </button>
                                                                                                ';



                                                    $toReturn .= ' </td>
                                                        </tr>';
        } else {
            $toReturn .= '<tr>
                                                    <td class="text-center">' . $row['id'] . '</td>
                                                    <td>' . $row['user_name'] . '</td>
                                                    <td>' . $row['email'] . '</td>
                                                    <td>' . $row['current_working_class'] . '</td>
                                                   
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['solicitor'] . '</td>
                                                  
                                                    <td class="td-actions text-center">
                                                        ';

                                                            $toReturn .= '                  <button type="button" rel="tooltip" class="btn btn-warning btn-round" onclick="details(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">person</i>
                                                                                                    </button>
                                                                                                     <button type="button" rel="tooltip" class="btn btn-info btn-round" onclick="generatePdf(\'' . $row['id'] . '\')">
                                                                                                        <i class="material-icons">description</i>
                                                                                                    </button>';

                                                    $toReturn .= '   </td>
                                                      </tr>';
        }
    }

}
else{
    echo "0";
    return;
}


echo $toReturn;

$conn->close();
?>
