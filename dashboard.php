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
    <style>
        .chartPreferences > svg > g > text  {
            font-size: 2.3rem;
        }
        .ct-series-a .ct-slice-pie, .ct-series-a .ct-area {
            fill: #FEB06A !important;
        }
        .ct-series-b .ct-slice-pie, .ct-series-b .ct-area {
            fill: #36D6E7 !important;
        }
        .card [data-background-color="red"] {
            background: linear-gradient(60deg, #FEB06A, #FEB06A) !important;
        </style>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
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
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
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
                        <a class="navbar-brand" href="./dashboard.php"> Dashboard </a>
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





<div class="row">
    <div class="col-md-6">
                    <div class="card card-chart">
                        <div class="card-header" data-background-color="orange">
                            <div id="straightLinesChart" class="ct-chart"></div>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Straight Lines Chart</h4>
                            <p class="category">Line Chart with Points</p>
                        </div>
                    </div>
    </div>




    <div class="col-md-6">
        <div class="card card-chart">
            <div class="card-header" data-background-color="rose">
                <div id="simpleBarChart" class="ct-chart"></div>
            </div>
            <div class="card-content">
                <h4 class="card-title">Simple Bar Chart</h4>
                <p class="category">Bar Chart</p>
            </div>
        </div>
    </div>


</div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="red">
                                    <i class="material-icons">pie_chart</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Completed vs Incomplete Forms</h4>
                                </div>
                                <div id="chartPreferences" class="ct-chart"></div>
                                <div class="card-footer">
                                    <h6>Description</h6>
                                    <i class="fa fa-circle" style="color: #36D6E7"></i> Complete Form
                                    <i class="fa fa-circle" style="color: #FEB06A"></i> Incomplete Form
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">timeline</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Users Quit Chart</h4>
                                </div>
                                <div id="chartPreferences2" class="ct-chart"></div>
                                <div class="card-footer">
                                    <h6>Description</h6>
                                    <i class="fa fa-circle" style="color: #36D6E7"></i> Yes
                                    <i class="fa fa-circle" style="color: #FEB06A"></i> No
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
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
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
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/nouislider.min.js"></script>


<script src="assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.body.style.overflow = 'hidden';
       // demo.initCharts();
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "4Slash1234!@#$";
        $dbname = "smart_will";

          $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo $conn->connect_error;

        }

        $lineChartPart1 = '';

        $sql = "SELECT DATE_FORMAT( (  `created_at` ) ,  '%b' ) AS date, COUNT(  `id` ) AS count
        FROM  `users`
        GROUP BY DATE_FORMAT( (  `created_at` ) ,  '%b' ) ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{
            $lineChartPart1 .= "[";
            while($row = $result->fetch_assoc()) {
                $lineChartPart1 .= "'" . $row['date'] . "', ";
            }
            $lineChartPart1 .= "]";
        }






        $lineChartPart2 = '';
        $sql = "SELECT DATE_FORMAT( (  `created_at` ) ,  '%b' ) AS date, COUNT(  `id` ) AS count
        FROM  `users`
        GROUP BY DATE_FORMAT( (  `created_at` ) ,  '%b' ) ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {



        }
        else{
            $lineChartPart2 .= "[";
            while($row = $result->fetch_assoc()) {
                $lineChartPart2 .= "'" . $row['count'] . "', ";
            }
            $lineChartPart2 .= "]";
        }




        $linePiePart1_1 = '';

        $sql = "SELECT  round((`a`.`submissionCount`/(select count(*) from `users`))*100,2) AS submissionCount, round((SUM(  `b`.`counter` )/(select count(*) from `users`))*100,2) AS restOfThem
FROM (

SELECT  `current_working_class` , COUNT( * ) AS submissionCount
FROM  `users` 
WHERE  `current_working_class` =  'submission'
GROUP BY  `current_working_class`
) AS a, (

SELECT  `current_working_class` , COUNT( * ) AS counter
FROM  `users` 
WHERE  `current_working_class` <>  'submission'
GROUP BY  `current_working_class`
) AS b
GROUP BY  `a`.`submissionCount`
LIMIT 1
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{
            $linePiePart1_1 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart1_1 .= "'" . $row['submissionCount'] . "%', '" .$row['restOfThem']. "%',";
            }
            $linePiePart1_1 .= "]";


        }

        $linePiePart1_2 = '';

        $sql = "SELECT  round((`a`.`submissionCount`/(select count(*) from `users`))*100,2) AS submissionCount, round((SUM(  `b`.`counter` )/(select count(*) from `users`))*100,2) AS restOfThem
FROM (

SELECT  `current_working_class` , COUNT( * ) AS submissionCount
FROM  `users` 
WHERE  `current_working_class` =  'submission'
GROUP BY  `current_working_class`
) AS a, (

SELECT  `current_working_class` , COUNT( * ) AS counter
FROM  `users` 
WHERE  `current_working_class` <>  'submission'
GROUP BY  `current_working_class`
) AS b
GROUP BY  `a`.`submissionCount`
LIMIT 1
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{
            $linePiePart1_2 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart1_2 .= "" . $row['submissionCount'] . ", " .$row['restOfThem']. ",";
            }
            $linePiePart1_2 .= "]";


        }























        $linePiePart2_1 = '';

        $sql = "SELECT `current_working_class`, count(*) as counter
from `users`
where `current_working_class` <> 'submission'
group by `current_working_class`
order by counter DESC
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {

        }
        else{
            $linePiePart2_1 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart2_1 .= "'" . $row['current_working_class'] . "', ";
            }
            $linePiePart2_1 .= "]";


        }

        $linePiePart2_2 = '';
        $maximum = 1;


        $sql = "SELECT `current_working_class`, count(*) as counter
from `users`
where `current_working_class` <> 'submission'
group by `current_working_class`
order by counter DESC
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{

            $linePiePart2_2 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart2_2 .= "" . $row['counter'] . ", ";
                if($row['counter'] > $maximum){
                    $maximum = $row['counter'];
                }
            }
            $linePiePart2_2 .= "]";


        }







        $linePiePart3_1 = '';

        $sql = "SELECT `solicitor`, round((COUNT(`solicitor`)/((select count(*) from users)))*100,2)  as count FROM `users` group by `solicitor`
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{
            $linePiePart3_1 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart3_1 .= "'" . $row['count'] . "%', ";
            }
            $linePiePart3_1 .= "]";


        }

        $linePiePart3_2 = '';

        $sql = "SELECT `solicitor`, round((COUNT(`solicitor`)/((select count(*) from users)))*100,2)  as count FROM `users` group by `solicitor`
 ";

        $result = $conn->query($sql);

        if (!($result->num_rows > 0)) {


        }
        else{
            $linePiePart3_2 .= "[";
            while($row = $result->fetch_assoc()) {
                $linePiePart3_2 .= "" . $row['count'] . ",";
            }
            $linePiePart3_2 .= "]";


        }



























        ?>



        dataStraightLinesChart = {
            labels: <?php echo $lineChartPart1 ?>,
            series: [
                <?php echo $lineChartPart2 ?>
            ]
        };

        optionsStraightLinesChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 15, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
            classNames: {
                point: 'ct-point ct-white',
                line: 'ct-line ct-white'
            }
        };

        var straightLinesChart = new Chartist.Line('#straightLinesChart', dataStraightLinesChart, optionsStraightLinesChart);

        md.startAnimationForLineChart(straightLinesChart);















        var dataPreferences = {
            labels: <?php if($linePiePart1_1 == '') echo "[]"; else echo $linePiePart1_1 ?>,
            series: <?php if($linePiePart1_2 == '') echo "[]"; else echo $linePiePart1_2 ?>,
        };

        var optionsPreferences = {
            height: '230px'
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);












        var dataSimpleBarChart = {
            labels: <?php echo $linePiePart2_1 ?>,
            series: [
                <?php echo $linePiePart2_2 ?>
            ]
        };

        var optionsSimpleBarChart = {
            seriesBarDistance: 10,
            high: <?php echo $maximum+5;?>,
            axisX: {
                showGrid: false
            }
        };

        var responsiveOptionsSimpleBarChart = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        var simpleBarChart = Chartist.Bar('#simpleBarChart', dataSimpleBarChart, optionsSimpleBarChart, responsiveOptionsSimpleBarChart);

        //start animation for the Emails Subscription Chart
        md.startAnimationForBarChart(simpleBarChart);









        var dataPreferences2 = {
            labels: <?php echo $linePiePart3_1 ?>,
            series: <?php echo $linePiePart3_2 ?>,
        };

        var optionsPreferences2 = {
            height: '230px'
        };

        Chartist.Pie('#chartPreferences2', dataPreferences2, optionsPreferences2);








    });
</script>

</html>