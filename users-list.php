<?php

session_start();

if (!(isset($_SESSION['user_id'])))
{
    header('Location: index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Smart Will</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <style>
        .paginate_button.active > a{
            background-color: #00b4cc !important;
            border-color: #00b4cc !important;
        }
    </style>
</head>

<body>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/jquery.datatables.js"></script>
<script>
    function fetch(){
        $.ajax({
            url:"api-webapp/api-fetchUsersList.php",
            type:"POST",

            success:function(data) {
                if(data != "0"){
                    $('#tableBody').contents().remove();
                    $( "#tableBody" ).append(data);

                    $('#datatables').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        responsive: true,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search records",
                        },
                        aaSorting: [[0, 'desc']],
                        bdestroy: true

                    });


                }
            },
            error:function(){
                console.log("error");

            }

        });
    }


    function generatePdf(id) {
        document.location.href = "will-pdf.php?id=" + id;
    }


    function details(id){

        $.ajax({
            url:"api-webapp/api-getDetails.php",
            type:"POST",
            data: {id: id},
            success:function(data) {
                if(data != "0"){
                    $('#detailsDiv').contents().remove();
                    $( "#detailsDiv" ).append(data);
                }
            },
            error:function(){
                console.log("error");
            }

        });




        $('#detailsModal').modal('show');
    }



</script>




<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <div class="logo">



            <a href="#" class="simple-text">
                <img src="assets\img\favicon.png" width="40px" height="40px"/>
                Smart Will
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="" class="simple-text">
                <img src="assets\img\favicon.png" width="40px" height="40px"/>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="assets/img/default-avatar.png" />
                </div>
                <div class="info">
                    <a  href="#" class="collapsed">
                        <?php echo $_SESSION['username'] ?>
                    </a>

                </div>
            </div>
            <ul class="nav">
                <li class="">
                    <a href="dashboard.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                     <a  href="users-list.php">
                        <i class="material-icons">list</i>
                        <p>Users List</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./users-list.php.php"> Users List </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="api-webapp/api-logout.php">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Logout</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">







                <div class="row animated" id=displayTable>
                    <div class="card">

                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Users List</h4>

                        <div class="card-content">
                            <div class="toolbar">
                                <div class="row">


                                </div>
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Current Form</th>
                                        <th>Signup Date</th>
                                        <th>Solicitor</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id=tableBody>




                                    <script>
                                        fetch();
                                    </script>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>






                <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-notice">
                        <div class="modal-content modal-lg">
                            <div id="detailsDiv">

                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Close<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 92.1562px; top: 28.75px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div><div class="ripple ripple-on ripple-out" style="left: 23.1562px; top: 10.75px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div></div></button>
                            </div>
                        </div>
                    </div>
                </div>














            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="">Smart Will</a>, Made Will Making Easy.
                </p>
            </div>
        </footer>
    </div>
</div>

</body>
<!--   Core JS Files   -->

<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->

<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/nouislider.min.js"></script>

<!-- Select Plugin -->
<script src="assets/js/jquery.select-bootstrap.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->


<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.body.style.overflow = 'hidden';




    });

    function generatePdf(id){
        window.location = "will-pdf.php?id="+id;
    }

</script>


</html>