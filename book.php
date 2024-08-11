<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');

include("menu.php");

$mysqli = new mysqli('localhost', 'root', '', 'projectgmrh');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$bookings = array();
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

$stmt = $mysqli->prepare("SELECT * FROM appointments WHERE date = ?");
$stmt->bind_param('s', $date);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row['timeslot'];
        }
    }
    $stmt->close();
} else {
    die("Error in SELECT query: (" . $stmt->errno . ") " . $stmt->error);
}

$duration = 30;
$cleanup = 10;
$start = "10:00";
$end = "16:00";
$currentDate = date('Y-m-d');

function timeslots($date, $duration, $cleanup, $start, $end)
{
    $start_time = new DateTime($date . ' ' . $start);
    $end_time = new DateTime($date . ' ' . $end);
    $currentTime = new DateTime();

    $slots = array();

    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");

    for ($intStart = clone $start_time; $intStart < $end_time; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);

        if ($endPeriod < $currentTime && $date == $currentTime->format('Y-m-d')) {
            continue;
        }
        
        $slots[] = $intStart->format("H:i") . " - " . $endPeriod->format("H:i");
    }

    return $slots;
}

$slots = timeslots($date, 30, 10, '10:00', '16:00');

$msg = ""; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $timeslot = $_POST['timeslot'];
    $treatment = $_POST['scheduleday'];
    $phone = $_POST['phone'];

    $stmt = $mysqli->prepare("INSERT INTO appointments (name, email, date, timeslot, treatment, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $name, $email, $date, $timeslot, $treatment, $phone);

    if ($stmt->execute()) {
        $msg = "Meeting added successfully!";
    } else {
        $msg = "Error in query execution: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('img/white2.png');
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .button-52 {
            font-size: 30px;
            font-family: Calibri Light;
            color: black;
            font-weight: 20;
            letter-spacing: 8px;
            padding: 13px 20px 19px;
            outline: 0;
            border: 2px solid black;
            cursor: pointer;
            position: relative;
            background-color: rgba(0, 0, 0, 0);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-52:after {
            content: "";
            background-color: #BEB896;
            width: 100%;
            z-index: -7;
            position: absolute;
            height: 100%;
            top: 11px;
            left: 11px;
            transition: 0.2s;
        }

        .button-52:hover:after {
            top: 0px;
            left: 0px;
        }

        @media (min-width: 768px) {
            .button-52 {
                padding: 13px 5px 12px;
            }
        }

        .divider {
            display: flex;
        }

        .divider:before,
        .divider:after {
            content: "";
            flex: 1;
        }

        .line {
            align-items: center;
            margin: 1em -1em;
        }

        .line:before,
        .line:after {
            height: 1px;
            margin: 0 1em;
        }

        .glow:before,
        .glow:after {
            height: 6px;
            -webkit-filter: blur(2px);
            border-radius: 5px;
        }

        .container {
            padding: 7%;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 8px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center" style="font-family: Calibri Light;">Scheduling appointments on <?php echo date('d/m/Y', strtotime($date)); ?></h1>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <?php echo $msg; // Display message ?>
            </div>
            <?php
            $timeslots = timeslots($date, $duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts) {
            ?>
                <div class="col-md-2">
                    <div class="form-group">
                        <br><br>
                        <?php if (!in_array($ts, $bookings)) { ?>
                            <div class="button-52" role="button">
                                <button class="btn btn book" style="background-color: #ffffff00" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog" style="background: linear-gradient(to left, #B0C4DE, gray, #708090);">
        <div class="modal-dialog">
            <span style=" color:#BEB896;">
                <div class="modal-content">
                    <span style=" color:#BEB896;">
                        <div class="modal-header" style="background-color: #F0F8FF;">
                            <button type="button" class="close" data-dismiss="modal"><span style=" color:#BEB896;">&times;</span></button>
                            <h4 class="modal-title"><span id="slot"></span> Meeting for hour:</h4>
                        </div>
                        <div class="modal-body" style="background-color: #F0F8FF; font-family: Calibri Light;">
                            <div class="row" style="text-align: right;">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                                        <div class="form-group">
                                            <label for="">hour</label>
                                            <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                        </div>
                                        <div class="form-group">
                                            <label for="">name</label>
                                            <input required type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">email</label>
                                            <input required type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">phone number</label>
                                            <input required type="tel" class="form-control" name="phone">
                                        </div>
                                        <div class="form-group" style="font-family: Calibri Light;">
                                            <label for="">Type of meeting:</label>
                                            <select class="select form-control" id="scheduleday" name="scheduleday" required>
                                                <option value="">Choose the type of meeting</option>
                                                <option value="Consultation">Consultation</option>
                                                <option value="Buying products">Buying products</option>
                                            </select>
                                        </div>
                                        <div class="form-group pull-left">
                                            <button name="submit" type="submit" class="btn btn-primary" style="background-color: #BEB896;">Confirmation</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
            </span>
        </div>
    </div>

    <script>
        $(".book").click(function () {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        });
    </script>
</body>
</html>
