<?php
session_start();
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
    <header>
        <div class="info">
            <h1>Body Mass Form</h1>
            <div class="meta">
                By <a href="https://github.com/twillsonepitech">Thomas Willson</a> and <a
                    href="https://github.com/Antweneee">Antoine Gavira-Bottari</a>
            </div>
        </div>
    </header>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            $nameErr = $weightErr = $heightErr = $ageErr = $genderErr = "";
            $name = $weight = $height = $age = $gender = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = parseInput($_POST["name"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["weight"])) {
                    $weightErr = "Weight is required";
                } else {
                    $weight = parseInput($_POST["weight"]);
                    if ($weight < 0) {
                        $weightErr = "Cannot have negative weight";
                    }
                }

                if (empty($_POST["height"])) {
                    $heightErr = "Height is required";
                } else {
                    $height = parseInput($_POST["height"]);
                    if ($height < 0) {
                        $heightErr = "Cannot have negative height";
                    }
                }

                if (empty($_POST["age"])) {
                    $ageErr = "Age is required";
                } else {
                    $age = parseInput($_POST["age"]);
                    if ($age < 0) {
                        $ageErr = "Cannot have negative age";
                    }
                }

                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = parseInput($_POST["gender"]);
                }

                if ($nameErr == "" && $weightErr == "" && $heightErr == "" && $ageErr == "" && $genderErr == "") {
                    $_SESSION['name'] = $name;
                    $_SESSION['weight'] = $weight;
                    $_SESSION['height'] = $height;
                    $_SESSION['age'] = $age;
                    $_SESSION['gender'] = $gender;            
                    header("Location: bodymass_calculation.php");
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
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" id="name" name="name" placeholder="Name"
                    value="<?php echo $name; ?>">
                <span class="error">*
                    <?php echo $nameErr; ?>
                </span>
            </div>

            <div class="input-container">
                <i class="fas fa-weight icon"></i>
                <input class="input-field" type="number" step=".1" pattern="\d+" id="weight" name="weight"
                    placeholder="Weight (kg)" value="<?php echo $weight; ?>">
                <span class="error">*
                    <?php echo $weightErr; ?>
                </span>
            </div>

            <div class="input-container">
                <i class="fas fa-arrows-alt-v icon"></i>
                <input class="input-field" type="number" step=".01" pattern="\d+" id="height" name="height"
                    placeholder="Height (m)" value="<?php echo $height; ?>">
                <span class="error">*
                    <?php echo $heightErr; ?>
                </span>
            </div>

            <div class="input-container">
                <i class="fas fa-birthday-cake icon"></i>
                <input class="input-field" type="number" step="1" pattern="\d+" id="age" name="age" placeholder="Age"
                    value="<?php echo $age; ?>">
                <span class="error">*
                    <?php echo $ageErr; ?>
                </span>
            </div>

            <tr>
                <td>
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
                        echo "checked"; ?> value="female">Female
                    <input style="margin-left: 75px;" type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
                        echo "checked"; ?> value="male">Male
                    <span style="margin-left: 120px;" class="error">*
                        <?php echo $genderErr; ?>
                    </span>
                </td>
            </tr>
            <br></br>
            <div id="gray-line"></div>
            <button id="submit" name="submit">
                <p style="position: relative;bottom: 5px;">Submit</p>
            </button>
        </form>
    </div>
    <footer>
    <p>Copyright @2023 | Designed by <a href="mailto:thomas.willson@s.unikl.edu.my">Thomas
            Willson</a> and <a href="mailto:antoine.gavira.bottari@s.unikl.edu.my">Antoine Gavira-Bottari</a></p>
    </footer>
</body>

</html>