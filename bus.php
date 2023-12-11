<?php
session_start();
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
    <header>
        <div class="info">
            <h1>Bus Departure Form</h1>
            <div class="meta">
                By <a href="https://github.com/twillsonepitech">Thomas Willson</a> and <a
                    href="https://github.com/Antweneee">Antoine Gavira-Bottari</a>
            </div>
        </div>
    </header>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            $dayErr = $timeErr = "";
            $day = $time = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["day"])) {
                    $dayErr = "Day is required";
                } else {
                    $day = parseInput($_POST["day"]);
                }

                if (empty($_POST["time"])) {
                    $timeErr = "Time is required";
                } else {
                    $time = parseInput($_POST["time"]);
                }

                if ($dayErr == "" && $timeErr == "") {
                    $_SESSION['day'] = $day;
                    $_SESSION['time'] = $time;
                    header("Location: bus_calculation.php");
                    exit();
                }
            }

            function parseInput($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <div id="gray-line"></div>
            <div class="input-container">
                <p><b>Departure day :</b>
                    <?php
                    $days = array(1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                    echo '<select id="sel" name="day">';
                    foreach ($days as $key => $value) {
                        echo "<option value=\"$key\">$value</option>\n";
                    }
                    echo '</select>';
                    ?>
                </p>
            </div>

            <div class="input-container">
                <p><b>Departure time :</b>
                    <?php
                    $times = array(1 => '7:00', '10:00', '13:00', '16:00', '21:00');
                    echo '<select id="sel" name="time">';
                    foreach ($times as $key => $value) {
                        echo "<option value=\"$key\">$value</option>\n";
                    }
                    echo '</select>';
                    ?>
                </p>
            </div>
            <br></br>
            <div id="gray-line"></div>
            <button id="submit" name="submit">
                <p style="position: relative;bottom: 5px;">Book</p>
            </button>
        </form>
    </div>
    <footer>
        <p>Copyright @2023 | Designed by <a href="mailto:thomas.willson@s.unikl.edu.my">Thomas
                Willson</a> and <a href="mailto:antoine.gavira.bottari@s.unikl.edu.my">Antoine Gavira-Bottari</a></p>
    </footer>

</body>

</html>