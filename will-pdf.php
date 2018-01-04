<?php

$testatorFirstName = '';
$testatorLastName = '';
$testatorBirthDate = '';
$testatorAddress = '';
$testatorPostalCode = '';



    if(isset($_GET['id'])){

        include "./api-webapp/config.php";
        session_start();


        // FOR USERS / testators

        $sql = 'SELECT * FROM `testator` where u_id='.$_GET['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $testatorFirstName = $row['first_name'] . $row['mid_name'];
                $testatorLastName = $row['sur_name'];
                $date=date_create($row['date_of_birth'],timezone_open("Europe/Oslo"));
                $testatorBirthDate = date_format($date,"d-m-Y");
                $testatorAddress = $row['address'];
                $testatorPostalCode = $row['post_code'];
            }
        }







    }


?>





<!DOCTYPE html>


<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{
            padding: 0px;
            margin: 0px auto;
        }
        .container{
            width: 980px;
        }



    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="assets/js/jspdf1.0.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.33/pdfmake.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>









   <!-- <script src="assets/js/jspdf1.0.js"></script>-->
    <script>


        $( document ).ready(function() {
//            var doc = new jsPDF("p", "", "A4");
//
//            var specialElementHandlers = {
//                '#content': function (element, renderer) {
//                    return true;
//                }
//            };
//
//
//            var columns = [
//                {title: "First Witness", dataKey: "fw1"},
//                {title: "Second Witness", dataKey: "fw2"}
//                ];
//            var rows = [
//                        {"fw1": "Signature", "fw2": "Signature"},
//                        {"fw1": "Full Name", "fw2": "Full Name"},
//                        {"fw1": "Address", "fw2": "Address"},
//                        {"fw1": "Telephone No.", "fw2": "Telephone No."},
//                ];
//
//
//
//
//
//                doc.fromHTML($('#firstPage').html(), 22,100, {
//                    'width': 170,
//                });
//                doc.addPage();
//                doc.fromHTML($('#secondPageHeading').html(), 95,10, {
//                    'width': 170,
//                });
//                doc.fromHTML($('#secondPage').html(), 15, 30, {
//                    'width': 170,
//                });
//                doc.addPage();
//                doc.fromHTML($('#third-page').html(), 15, 10, {
//                    'width': 170,
//                });
////                doc.autoTable(columns, rows, {
////                    styles: { fontSize: 12,
////                        font: "helvetica"},
////                    theme: 'plain',
////                });
//                doc.save('sample-file.pdf');
//


//            var pdf = new jsPDF('p', 'pt', 'letter');
//            pdf.addHTML($('#firstPage')[0], function () {
//                pdf.save('Test.pdf');
//            });

        });






    </script>
</head>

<body id="content">
<div class="container" id="firstPage" style="background-color: white;">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="first_page" style="  text-align: center;">

        <p><b>THE LAST WILL AND TESTAMENT</b></p>
        <br>
        <p><b>of</b></p>
        <br>
        <p><b><?php echo $testatorFirstName ." " . $testatorLastName; ?></b></p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<div id="secondPageHeading" style="page-break-before: always;">
    <h3 style="text-align: -webkit-center; margin-top: 50px;">Revocation</h3>
</div>
<div class="container"  id=secondPage style="background-color: white;">
    <div class="first_page">

        <br>
        <h4>I <?php echo $testatorFirstName ." " . $testatorLastName; ?> born <?php echo $testatorBirthDate; ?> of <?php echo $testatorAddress . ", " . $testatorPostalCode ; ?> revoke
            all earlier Wills and declare this to be my last Will.</h4>
        <br>
        <h3><u>Executors and Trustees</u></h3>
        <br>


        <p>1. I appoint as my Executors the probate manager of SmartWill
        <?php
            $count =0;
            $sql = 'SELECT * FROM `executor` WHERE u_id='.$_GET['id'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo " and my ";
                while ($row = $result->fetch_assoc()) {
                    echo " " . $row['relationship'] . " " . $row['first_name'] . " " . $row['sur_name'] . "";

                    if($result->num_rows > 1 && $count < 1 ){
                        echo " and my";
                        $count++;
                    }
                }
                echo ".";
            }




        ?>
        </p>


        <br>
        <p>1.1 I appoint as my Trustees those of my executors who obtain probate of this will.</p>
        <br>
        <p>1.2 In this Will the expression `my Trustees` means (as the context requires) my Executors
            and my Trustees for the time being of any Trust arising under this Will.</p>
        <br><br>
        <h3><u>Funeral Wishes</u></h3>
        <br>




        <p>2. I wish to be
        <?php
        $sql = 'SELECT * FROM `special_request` WHERE u_id='.$_GET['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo " " . $row['buried_cremated'] . ".";
            }
        }


        ?>
        </p>



        <br><br>

        <?php
        $count =1;
        $sql = 'SELECT * FROM `gifts` WHERE u_id='.$_GET['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3><u>Specific Gifts (first death)</u></h3><br>";
            echo "<p>3. I give: </p><br>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><b>$count.</b> ".$row['gifts']." free of inheritance tax to my ".$row['relationship']. " " .$row['first_name']. " " .$row['mid_name']. " " . $row['sur_name']."." ."</p><br>";
                $count = $count+1;
            }
        }
        else {
            $sql = 'SELECT * FROM `gifts_legacy` WHERE u_id=' . $_GET['id'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h3><u>Legacy to Charity</u></h3><br>";
                echo "<p>3. I give: </p><br>";
                while ($row = $result->fetch_assoc()) {

                    if ($row['foundation1'] != '') {
                        echo "<p><b>1. </b>" . $row['gift_1'] . " to " . $row['foundation1'] . " [registered under Charity No. " . $row['charity_no_1'] . "] (the charity)</p><br>";
                    }
                    if ($row['foundation2'] != '') {
                        echo "<p><b>2. </b>" . $row['gift_2'] . " to " . $row['foundation2'] . " [registered under Charity No. " . $row['charity_no_2'] . "] (the charity)</p><br>";
                    }
                    if ($row['foundation3'] != '') {
                        echo "<p><b>3. </b>" . $row['gift_3'] . " to " . $row['foundation3'] . " [registered under Charity No. " . $row['charity_no_3'] . "] (the charity)</p><br>";
                    }
                }
            }
        }
        ?>




<!--        <p>[description of gift or sum of money] free of inheritance tax to my [relationship]-->
<!--            [first names][last name].</p>-->
<!--        <br>-->
<!--        <p>[Add gift]</p>-->
        <br><br>
        <h3><u>Administration of Estate</u></h3>
        <br>
        <p>4. My Trustees shall hold the rest of my estate on trust for sale with power to postpone sale to
            pay executorship expenses and debts including mortgages secured on real or leasehold
            property and any inheritance tax in respect of property passing under this Will or which
            becomes payable because of my death on any lifetime transfer by me or payable because of
            my death on property in which I hold a beneficial interest as joint tenant.</p>
        <br>
        <p>4.1 My Trustees shall hold the residue (`my residuary estate`) on the trusts of the following
            clauses.</p>
        <br><br>

</div>
</div>
    <div class="container" id="third-page">
        <div class="first_page">
        <?php
        $option1 = '';
        $option2 = '';
        $option3 = '';
        $sql = 'SELECT * FROM `support_desission` WHERE user_id='.$_GET['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $option1 = $row['option1'];
                $option2 = $row['option2'];
                $option3 = $row['option3'];
            }


            if($option1 == "Yes" && $option2 == "No" && $option3 == "No"){
                echo "<h3><u>Gift of Residue </u></h3>
                    <br>
                    <p>5. My Trustees shall pay my residuary estate to my ";

                $sql = 'SELECT * FROM `spouse` WHERE u_id='.$_GET['id'];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "spouse " . $row['first_name'] . " " . $row['mid_name'] . " " . $row['sur_name'] . " ";
                    }
                }
                else{
                    echo " ** No Spouse Entered ** ";
                }




                echo "if [he/she] survives me by thirty days but if this gift fails the following provisions of my Will
                        shall apply.</p>
                    <br>";




            }



            else if($option1 == "No" && $option2 == "Yes" && $option3 == "Yes"){

               echo " <h3><u>Gift of Residue </u></h3>
                    <br>
                    <p>5. My Trustees shall divide my residuary estate equally among those of my children
                     ";
                    if($option3 == "Yes") echo"(and step children)";
                    echo "
                     who survive me but if any of them dies before me or before attaining a vested interest his or her issue shall upon attaining eighteen years take equally per stirpes the share which such deceased child would otherwise have inherited but none of my issue shall be entitled to benefit while his or her parent is eligible.</p>
                    <br>";


            }



            else if($option1 == "Yes" && $option2 == "Yes" && $option3 == "Yes"){
                            echo "<h3><u>Gift of Residue </u></h3>
                    <br>
                    <p>5. My Trustees shall pay my residuary estate to my ";

                        $sql = 'SELECT * FROM `spouse` WHERE u_id='.$_GET['id'];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "spouse " . $row['first_name'] . " " . $row['mid_name'] . " " . $row['sur_name'] . " ";
                            }
                        }
                        else{
                            echo " ** No Spouse Entered ** ";
                        }
                           
                           
                           
                           
                            echo "[he/she] survives me by thirty days but if this gift fails the following provisions of my Will
                        shall apply.</p>
                    <br>
                    
                    <h3><u>Gift of Residue </u></h3>
                    <br>
                    <p>6. My Trustees shall divide my residuary estate equally among those of my children ";
                    if($option3 == "Yes") echo"(and step children)";
                    echo " who survive me but if any of them dies before me or before attaining a vested interest his or her issue shall upon attaining eighteen years take equally per stirpes the share which such deceased child would otherwise have inherited but none of my issue shall be entitled to benefit while his or her parent is eligible.</p>
                    ";
            }

        else if($option1 == "No" && $option2 == "No" && $option3 == "No"){



        $sql = 'SELECT * FROM `resedue_of_estate` WHERE u_id='.$_GET['id'] . ' and type="beneficiary"';
        $result = $conn->query($sql);
            echo "
                <h3><u>Further Gift of Residue</u></h3>
                <br>
                <p>6. My Trustees shall divide my residuary estate among the following beneficiaries who survive me in the shares specified:-
                </p>
                <br>";
        $count = 0;
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo " <p>(i) To my ".$row['relationship']." " . $row['first_name'] . " " . $row['mid_name'] . " " . $row['sur_name'] . " " ."a share of ".$row['estate']."% but if my he/ she dies before me or before attaining a vested interest then his or her issue shall upon attaining eighteen years take equally per stirpes the share which such deceased beneficiary would otherwise have inherited but so that no one shall be entitled to benefit while his or her parent is eligible.</p>
                        <br>";
            }
        }


            echo "<p>5.1 If any of the share or shares set out in clause 6 shall lapse or fail entirely then such share or shares shall accrue to the other share or shares which have not lapsed or failed in the proportions which they bear to one another so that no share of my residuary estate shall be undisposed of.</p>
                <br>";
            


        }



        }
        ?>

















        <br><br>
        <h3><u>S.T.E.P. Provisions</u></h3>
        <br>





        <p>7. The Standard Provisions of the Society of Trust and Estate Practitioners Second Edition
            shall apply to this Will and the trusts created under it.</p>
        <br><br>
        <h3><u>Avoidance of doubt</u></h3>
        <br>
        <p>8. For the avoidance of doubt I confirm that the reverse side of every page of my Will has
            been purposely left blank and that this is the last clause of my Will and is immediately
            followed on the next page by the testimonium and attestation clause.</p>
        <br><br>
        <h3><u>Testimonium and Attestation</u></h3>
        <br>
        <p style="text-indent: 5em">As Witness my hand this</p>
        <br><br>
        <p style="text-indent: 11em;">day of</p>
        <br><br>
        <p style="text-indent: 5em">in the year Two Thousand And Seventeen.</p>
        <br><br>
        <p style="text-indent: 5em">Signed by the Testator in</p>
        <p style="text-indent: 5em;">our presence and attested</p>
        <p style="text-indent: 5em;">by us in the presence of</p>
        <p style="text-indent: 5em;">the Testator and of each</p>
        <p style="text-indent: 5em;">other:-<span style="margin-left: 500px;">.............................................................</span></p>
        <br><br>

            <table style="width:100%">
                <tr>
                    <th>FIRST WITNESS</th>
                    <th>SECOND WITNESS</th>
                </tr>
                <tr>
                    <td>Signature</td>
                    <td>Signature</td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td>Full Name</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>Address</td>
                </tr>

                <tr>
                    <td>Telephone No.</td>
                    <td>Telephone No.</td>
                </tr>
            </table>




    </div>
</div>

</body>





</html>