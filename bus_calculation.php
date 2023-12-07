<?php
session_start();

$_day = $_SESSION['day'];
$_time = $_SESSION['time'];
$days = array(1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$times = array(1 => '7:00', '10:00', '13:00', '16:00', '21:00');

$day = $days[$_day];
$time = $times[$_time];

$schedule = [
    'Saturday' => [
        '7:00' => 'RM 8',
        '10:00' => 'RM 8',
        '13:00' => 'RM 8',
        '16:00' => 'RM 8',
        '21:00' => 'RM 6',
    ],
    'Sunday' => [
        '7:00' => 'RM 8',
        '10:00' => 'RM 8',
        '13:00' => 'RM 8',
        '16:00' => 'RM 8',
        '21:00' => 'RM 6',
    ],
    'Monday' => [
        '7:00' => 'RM 6',
        '10:00' => 'RM 6',
        '13:00' => 'RM 6',
        '16:00' => 'RM 6',
        '21:00' => 'RM 5',
    ],
    'Tuesday' => [
        '7:00' => 'RM 6',
        '10:00' => 'RM 6',
        '13:00' => 'RM 6',
        '16:00' => 'RM 6',
        '21:00' => 'RM 5',
    ],
    'Wednesday' => [
        '7:00' => 'RM 6',
        '10:00' => 'RM 6',
        '13:00' => 'RM 6',
        '16:00' => 'RM 6',
        '21:00' => 'RM 5',
    ],
    'Thursday' => [
        '7:00' => 'RM 6',
        '10:00' => 'RM 6',
        '13:00' => 'RM 6',
        '16:00' => 'RM 6',
        '21:00' => 'RM 5',
    ],
    'Friday' => [
        '7:00' => 'RM 6',
        '10:00' => 'RM 6',
        '13:00' => 'RM 6',
        '16:00' => 'RM 6',
        '21:00' => 'RM 5',
    ],
];

// unset($_SESSION['day']);
// unset($_SESSION['time']);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Departure</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Bus Departure Calculator</h2>
        <div id="gray-line"></div>
        <div class="row">
            <span class="label">Day</span>
            <span class="label">Time</span>
            <span class="label">Price</span>
        </div>
        <div class="row">
            <span class="value"><?php echo $day; ?></span>
            <span class="value"><?php echo $time; ?></span>
            <span class="value"><?php echo $schedule[$day][$time]; ?></span>
            <br></br>
        </div>
        <div id="gray-line"></div>
        <button onclick="redirect()">
            <p style="position: relative;bottom: 5px;">Book again !</p>
        </button>
    </div>
</body>
<footer>
    <p>Copyright @2023 | Designed by <a href="mailto:thomas.willson@s.unikl.edu.my">Thomas
            Willson</a> and <a href="mailto:antoine.gavira.bottari@s.unikl.edu.my">Antoine Gavira-Bottari</a></p>
</footer>
<script>
    function redirect() {
        window.location.href = 'bus.php';
    }
</script>

</html>