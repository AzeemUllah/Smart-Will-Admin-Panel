<?php
include "config.php";
session_start();
$toReturn = '';

$sql = 'SELECT * FROM `users` where id='.$_POST['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                    <h5 class="modal-title" id="myModalLabel">Details about user: <strong> '.$row["user_name"].'</strong></h5>
                                </div>';
    }
}
else{
        echo "0";
        return;
        exit;
}

$toReturn .= ' <div class="modal-body">';






$sql = 'SELECT * FROM `testator` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='<div class="row">
                                    <div class="col-md-6"><strong><u>Testator Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Gender: </strong></div>
                                    <div class="col-md-3">'.$row["gender"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Address: </strong></div>
                                    <div class="col-md-3">'.$row["address"].'</div>
                                    <div class="col-md-2"><strong>Postal Code: </strong></div>
                                    <div class="col-md-4">'.$row["post_code"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Date of Birth: </strong></div>
                                    <div class="col-md-3">'.$row["date_of_birth"].'</div>
                                    <div class="col-md-2"><strong>Email: </strong></div>
                                    <div class="col-md-4">'.$row["email"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Telephone: </strong></div>
                                    <div class="col-md-3">'.$row["telephone"].'</div>
                                    <div class="col-md-2"><strong> </strong></div>
                                    <div class="col-md-4"></div>
                                </div>';
    }
}
else{
    $toReturn .= '    <div class="row text-center">
                                    <div class="col-md-12"><strong>User havn\'t mentioned testator details.</strong></div>
                                </div>';
}





$toReturn .=  " <hr>";





$sql = 'SELECT * FROM `spouse` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='     <div class="row">
                                    <div class="col-md-6"><strong><u>Spouse Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Gender: </strong></div>
                                    <div class="col-md-3">'.$row["gender"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Address: </strong></div>
                                    <div class="col-md-3">'.$row["address"].'</div>
                                    <div class="col-md-2"><strong>Postal Code: </strong></div>
                                    <div class="col-md-4">'.$row["post_code"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Date of Birth: </strong></div>
                                    <div class="col-md-3">'.$row["date_of_birth"].'</div>
                                    <div class="col-md-2"><strong>Email: </strong></div>
                                    <div class="col-md-4">'.$row["email"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Telephone: </strong></div>
                                    <div class="col-md-3">'.$row["telephone"].'</div>
                                    <div class="col-md-2"><strong> </strong></div>
                                    <div class="col-md-4"></div>
                                </div>';
    }
}else{
    $toReturn .= ' <div class="row text-center">
                                    <div class="col-md-12"><strong>No Spouse Mentioned</strong></div>
                                </div>';
}








$toReturn .= "<hr>";






$sql = 'SELECT * FROM `executor` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='         <div class="row">
                                    <div class="col-md-6"><strong><u>Executor Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='            <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Date of Birth: </strong></div>
                                    <div class="col-md-4">'.$row["date_of_birth"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Address: </strong></div>
                                    <div class="col-md-3">'.$row["address"].'</div>
                                    <div class="col-md-2"><strong>Postal Code: </strong></div>
                                    <div class="col-md-4">'.$row["post_code"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Relationship: </strong></div>
                                    <div class="col-md-3">'.$row["relationship"].'</div>
                                </div>
                         
                                  <br>';
    }
}
else{
    $toReturn .= '    <div class="row text-center">
                                    <div class="col-md-12"><strong>User havn\'t reached executer page.</strong></div>
                                </div>';
}





$toReturn .= '<hr>';







$sql = 'SELECT * FROM `guardians` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='            <div class="row">
                                    <div class="col-md-6"><strong><u>Guardians Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='             <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Date of Birth: </strong></div>
                                    <div class="col-md-4">'.$row["date_of_birth"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Address: </strong></div>
                                    <div class="col-md-3">'.$row["address"].'</div>
                                    <div class="col-md-2"><strong>Postal Code: </strong></div>
                                    <div class="col-md-4">'.$row["post_code"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><strong>Relationship: </strong></div>
                                    <div class="col-md-4">'.$row["relationship"].'</div>
                                </div>

                                <br>';
    }
}
else{
    $toReturn .= '    <div class="row text-center">
                                    <div class="col-md-12"><strong>User havn\'t mentioned guardian.</strong></div>
                                </div>';
}




$toReturn .= '<hr>';





$sql = 'SELECT * FROM `gifts_legacy` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='                 <div class="row">
                                    <div class="col-md-6"><strong><u>Charity Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='                     <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["foundation1"].'</div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"><strong>Number: </strong></div>
                                            <div class="col-md-8">'.$row["charity_no_1"].'</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"><strong>Amount/Gift: </strong></div>
                                            <div class="col-md-8">'.$row["gift_1"].'</div>
                                        </div>
                                    </div>
                                </div>

                                <br>';

        if($row['foundation2'] != ''){
            $toReturn .= '<div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["foundation2"].'</div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"><strong>Number: </strong></div>
                                            <div class="col-md-8">'.$row["charity_no_2"].'</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"><strong>Amount/Gift: </strong></div>
                                            <div class="col-md-8">'.$row["gift_2"].'</div>
                                        </div>
                                    </div>
                                </div>

                                <br>';
        }

        if($row['foundation3'] != ''){
            $toReturn .= '<div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["foundation3"].'</div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"><strong>Number: </strong></div>
                                            <div class="col-md-8">'.$row["charity_no_3"].'</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"><strong>Amount/Gift: </strong></div>
                                            <div class="col-md-8">'.$row["gift_3"].'</div>
                                        </div>
                                    </div>
                                </div>

                                <br>';
        }

    }
}
else{
    $toReturn .= ' <div class="row text-center">
                                    <div class="col-md-12"><strong>No Charity Mentioned</strong></div>
                                </div>';
}



$toReturn .= '<hr>';






$sql = 'SELECT * FROM `gifts` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='                <div class="row">
                                    <div class="col-md-6"><strong><u>Gifts Details: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='                     <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Relationship: </strong></div>
                                    <div class="col-md-4">'.$row["relationship"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Gift: </strong></div>
                                    <div class="col-md-3">'.$row["gifts"].'</div>
                                </div>

                                <br>';
    }
}
else{
    $toReturn .= ' <div class="row text-center">
                                    <div class="col-md-12"><strong>No Gifts Mentioned</strong></div>
                                </div>';
}



$toReturn .= '<hr>';










$sql = 'SELECT * FROM `resedue_of_estate` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='                  <div class="row">
                                    <div class="col-md-6"><strong><u>Residue of State: </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='                      <div class="row">
                                    <div class="col-md-3"><strong>Name: </strong></div>
                                    <div class="col-md-3">'.$row["first_name"]. ' ' .$row["mid_name"]. ' ' . $row["sur_name"].'</div>
                                    <div class="col-md-2"><strong>Relationship: </strong></div>
                                    <div class="col-md-3">'.$row["relationship"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Estate: </strong></div>
                                    <div class="col-md-3">'.$row["estate"].'%</div>
                                    <div class="col-md-2"><strong>Type: </strong></div>
                                    <div class="col-md-4">'.$row["type"].'</div>
                                </div>

                                <br>';
    }
}
else{
    $toReturn .= '    <div class="row text-center">
                                    <div class="col-md-12"><strong>Residue of state will be divided equally amoung all he childrens equally.</strong></div>
                                </div>';
}



$toReturn .= '<hr>';








$sql = 'SELECT * FROM `special_request` where `u_id`='.$_POST['id'];
$result = $conn->query($sql);

$toReturn .='                   <div class="row">
                                    <div class="col-md-6"><strong><u>Special Request </u></strong></div>
                                    <div class="col-md-6"></div>
                                </div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $toReturn .='                   <div class="row">
                                    <div class="col-md-3"><strong>Buried/Cremated: </strong></div>
                                    <div class="col-md-3">'.$row["buried_cremated"].'</div>
                                    <div class="col-md-2"><strong>Home Owner: </strong></div>
                                    <div class="col-md-4">'.$row["home_owner"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Prepaid Plan </strong></div>
                                    <div class="col-md-3">'.$row["prepaid_plan"].'</div>
                                    <div class="col-md-2"><strong>Video URL: </strong></div>
                                    <div class="col-md-4">'.$row["video_storage"].'</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Music: </strong></div>
                                    <div class="col-md-9">'.$row["music"].'</div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3"><strong>Special Request: </strong></div>
                                    <div class="col-md-9">'.$row["request"].'</div>
                                </div>';
    }
}
else{
    $toReturn .= '    <div class="row text-center">
                                    <div class="col-md-12"><strong>User havn\'t reached special request page.</strong></div>
                                </div>';
}






$toReturn .= ' </div>';


echo $toReturn;

$conn->close();

?>