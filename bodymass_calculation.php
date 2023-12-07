<?php
session_start();

$name = $_SESSION['name'];
$weight = $_SESSION['weight'];
$height = $_SESSION['height'];
$age = $_SESSION['age'];
$gender = $_SESSION['gender'];

$sub = ($gender === "male") ? 16.2 : 5.4;

$bmi = $weight / pow($height, 2);
$lbm = (1.20 * $bmi) + (0.23 * $age - $sub);

if ($gender === "male") {
    if ($lbm < 2) {
        $category = "No category";
    } else if ($lbm >= 2 && $lbm <= 5) {
        $category = "Essential Fat";
    } else if ($lbm >= 6 && $lbm <= 13) {
        $category = "Athletes";
    } else if ($lbm >= 14 && $lbm <= 17) {
        $category = "Fitness";
    } else if ($lbm >= 18 && $lbm <= 25) {
        $category = "Average";
    } else if ($lbm > 25) {
        $category = "Obese";
    }
} else {
    if ($lbm < 10) {
        $category = "No category";
    } else if ($lbm >= 10 && $lbm <= 13) {
        $category = "Essential Fat";
    } else if ($lbm >= 14 && $lbm <= 20) {
        $category = "Athletes";
    } else if ($lbm >= 21 && $lbm <= 24) {
        $category = "Fitness";
    } else if ($lbm >= 25 && $lbm <= 31) {
        $category = "Average";
    } else if ($lbm >= 32) {
        $category = "Obese";
    }
}

// unset($_SESSION['name']);
// unset($_SESSION['weight']);
// unset($_SESSION['height']);
// unset($_SESSION['age']);
// unset($_SESSION['gender']);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Body Mass</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Body Mass Calculator</h2>
        <div id="gray-line"></div>
        <div class="row">
            <span class="label">Name</span>
            <span class="label">Age</span>
            <span class="label">Gender</span>
        </div>
        <div class="row">
            <span class="value"><?php echo $name; ?></span>
            <span class="value"><?php echo $age; ?></span>
            <span class="value"><?php echo ucfirst($gender); ?></span>
            <br></br>
        </div>
        <div id="gray-line"></div>
        <div class="row">
            <span class="label">Weight (kg)</span>
            <span class="label">Height (m)</span>
        </div>
        <div class="row">
            <span class="value"><?php echo $weight; ?></span>
            <span class="value"><?php echo $height; ?></span>
            <br></br>
        </div>
        <div id="gray-line"></div>
        <div class="row">
            <span class="label">BMI</span>
            <span class="label">LBM</span>
            <span class="label">LBM Category</span>
        </div>
        <div class="row">
            <span class="value"><?php echo round($bmi, 1); ?></span>
            <span class="value"><?php echo round($lbm, 1); ?></span>
            <span class="value"><?php echo $category; ?></span>
            <br></br>
        </div>
        <div id="gray-line"></div>
        <button onclick="redirect()">
            <p style="position: relative;bottom: 5px;">Try again !</p>
        </button>
    </div>
</body>
<footer>
    <p>Copyright @2023 | Designed by <a href="mailto:thomas.willson@s.unikl.edu.my">Thomas
            Willson</a> and <a href="mailto:antoine.gavira.bottari@s.unikl.edu.my">Antoine Gavira-Bottari</a></p>
</footer>
<script>
    function redirect() {
        window.location.href = 'bodymass.php';
    }
</script>

</html>