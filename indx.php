<?php include('menu.php') ?>

<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'projectgmrh');

    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    $numberDays = date('t',$firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'  style=color:#B8860B>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' style=background-color:#B8860B; href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Last Month</a> ";
    $calendar .= " <a class='btn btn-xs btn-primary'style=background-color:#B8860B; href='?month=".date('m')."&year=".date('Y')."'>This Month</a> ";
    $calendar .= "<a class='btn btn-xs btn-primary' style=background-color:#B8860B; href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>next Month</a></center><br>";
    $calendar .= "<tr>";

    foreach($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }

    $currentDay = 1;

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar .= "<td  class='empty'></td>"; 
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr ><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";

        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' style=background-color:#B8860B;''>X</button>";
        } else {
            $total=check($mysqli,$date);
            if($total == 12){
                $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>All the hours have been scheduled!!</button>";
            } else{
                $clearing=12-$total;
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'style=background-color:#B8860B;> <small><i>Left $clearing hours </i></small></a>";
            }
        }

        $calendar .="</td>";
        $currentDay++;
        $dayOfWeek++;

    }

    if ($dayOfWeek != 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($l=0;$l<$remainingDays;$l++){
            $calendar .= "<td class='empty'></td>"; 
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    echo $calendar;
}

function check($conn, $date)
{
    $totalBooking = 0; // Initialize the variable

    $stmt = $conn->prepare("select * from appointments where date = ?");
    $stmt->bind_param('s', $date);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $totalBooking++;
            }
            $stmt->close();
        }
    } else {
        die('Error executing the query: ' . $stmt->error);
    }

    return $totalBooking;
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
   body {
	background-image:url('img/white2.png');
	background-attachment:fixed;
    background-size:100% 100%;
}
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align:center;"><span style=" color:#B8860B;"><span style="font-size:30px;" tabindex="0">Countact Us</span></span></div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    $dateComponents = getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month = $_GET['month']; 			     
                        $year = $_GET['year'];
                    } else {
                        $month = $dateComponents['mon']; 			     
                        $year = $dateComponents['year'];
                    }
                    echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    <?php include("foter.php"); ?>
</body>

</html>
