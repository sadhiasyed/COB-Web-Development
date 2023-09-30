<!DOCTYPE html>
<html>

<head>
    <title>SADHIA'S-REGISTRATION FORM</title>
    <style>
        .error {
            color: #FF0001;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            border-color: rgb(205, 78, 169);
        }

        .main-box {
            width: 400px;
            border: none;
            box-shadow: 0px 0px 8px 0px #1d1d1d9c;
            background-color: rgb(255, 182, 193);
            margin-left: 50px;
            padding: 20px;
        }

        label,
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }

        h1 {
            padding-top: 10px;
            padding-left: 10px;
            font-weight: lighter;
        }

        input[type="text"],
        input[type="Number"],
        input[type="Date"],
        select,
        textarea,
        input[type="submit"],
        input[type="reset"] {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            letter-spacing: 2px;
            text-decoration: none;
            color: #000;
            cursor: pointer;
            border: 3px solid;
            padding: 0.25em 0.5em;
            box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
            position: relative;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="Number"]:focus,
        input[type="Date"]:focus,
        select:focus,
        textarea:focus,
        input[type="submit"]:focus,
        input[type="reset"]:focus {
            outline: none;
        }

        input[type="submit"],
        input[type="reset"] {
            margin-top: 20px;
            margin-right: 10px;
        }

        .button-container {
            text-align: center;
        }
        .success-message {
            font-size: 24px;
            color: #4CAF50;
            text-align: center;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .form-column {
            width: 48%;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .input-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $fnameErr = $lnameErr = $ageErr = $dobErr = $emailErr =
        $PasswordErr = $ConfirmErr = $YearErr = $genderErr = $coursesErr =
        $websiteErr = $mobilenoErr = "";
    $fname = $lname = $age = $dob = $email = $Password = $Confirm =
        $Year = $gender = $courses = $website = $mobileno = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
        } else {
            $fname = input_data($_POST["fname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                $fnameErr = "Only alphabets and white space are allowed";
            }
        }
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
        } else {
            $lname = input_data($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                $lnameErr = "Only alphabets and white space are allowed";
            }
        }
        if (empty($_POST["age"])) {
            $ageErr = "age is required";
        } else {
            $age = input_data($_POST["age"]);
            if (!preg_match("/^[0-9]*$/", $age)) {
                $ageErr = "Only numeric value is allowed.";
            }
            if (empty($_POST["dob"])) {
                $dobErr = "dob is required";
            } else {
                $dob = input_data($_POST["dob"]);
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = input_data($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
            if (empty($_POST["Password"])) {
                $PasswordErr = "Password is required";
            } else {
                $Password = input_data($_POST["Password"]);
            }
            if (empty($_POST["Confirm"])) {
                $ConfirmErr = "Confirm Password is required";
            } else {
                $Confirm = input_data($_POST["Confirm"]);
            }
            if (empty($_POST["Year"])) {
                $YearErr = "Year is required";
            } else {
                $Year = input_data($_POST["Year"]);
            }
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = input_data($_POST["gender"]);
            }
            if (empty($_POST["courses"])) {
                $coursesErr = "completed courses is required";
            } else {
                $courses = input_data($_POST["courses"]);
            }
        }
        if (empty($_POST["website"])) {
            $websiteErr = "Website URL is required";
        } else {
            $website = input_data($_POST["website"]);
            if
            (
                !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:
        ,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)
            ) {
                $websiteErr = "Invalid URL";
            }
        }
        if (empty($_POST["mobileno"])) {
            $mobilenoErr = "Mobile no is required";
        } else {
            $mobileno = input_data($_POST["mobileno"]);
            if (!preg_match("/^[0-9]*$/", $mobileno)) {
                $mobilenoErr = "Only numeric value is allowed.";
            }
            if (strlen($mobileno) != 10) {
                $mobilenoErr = "Mobile no must contain 10 digits.";
            }
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="main-box">
        <h1> <b>REGISTRATION FORM</b></h1>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fname">First name*:</label>
            <input type="text" placeholder="Enter first name" id="fname" name="fname"><br><br>
            <span class="error">* First name is required <?php echo $fnameErr; ?></span>
            <br><br>
            <label for="lname">Last name*:</label>
            <input type="text" placeholder="Enter last name" id="lname" name="lname"><br><br>
            <span class="error">* Last name is required <?php echo $lnameErr; ?></span>
            <br><br>
            <label for="age">Age*:</label>
            <input type="Number" id="age" name="age"><br><br>
            <span class="error">* Age is required <?php echo $ageErr; ?></span>
            <br><br>
            <label for="dob">Date of Birth*:</label>
            <input type="Date" id="dob" name="dob"><br><br>
            <span class="error">* Dob is required <?php echo $dobErr; ?></span>
            <br><br>
            <label for="email">Email Address*:</label>
            <input type="text" placeholder="Enter email address" name="email"> <br><br>
            <span class="error">* Email is required <?php echo $emailErr; ?></span>
            <br><br>
            <label for="Password">Password*:</label>
            <input type="text" placeholder="Enter your Password" id="Password" name="Password"><br><br>
            <span class="error">* Password is required <?php echo $PasswordErr; ?></span>
            <br><br>
            <label for="Confirm">Confirm Password*:</label>
            <input type="text" placeholder="Re-enter your Password" id="Confirm" name="Confirm"><br><br>
            <span class="error">* Confirm is required <?php echo $ConfirmErr; ?></span>
            <br><br>
            <label for="Current Studying">Current Studying Year*:</label><br>
            <input type="radio" name="Year" value="1st Year" /> 1st Year
            <input type="radio" name="Year" value="2nd Year" /> 2nd Year<br>
            <input type="radio" name="Year" value="3rd Year" /> 3rd Year
            <input type="radio" name="Year" value="4th Year" /> 4th Year<br><br>
            <span class="error">* Year is required <?php echo $YearErr; ?></span>
            <br><br>
            <label for="Gender">Gender*:</label>
            <select class="gender" name="gender"></label>
                <option value="Female">Female </option>
                <option value="Male">Male </option>
                <option value="Other">Other </option>
            </select>
            <span class="error"><?php echo $genderErr; ?></span>
            <br><br>
            <label for="Programming">Completed courses*:</label><br>
            <input type="checkbox" name="courses" value="Java" /> Java
            <input type="checkbox" name="courses" value="Web Technologies" /> Web Technologies
            <input type="checkbox" name="courses" value="Python" /> Python<br><br>
            <span class="error">* Courses is required <?php echo $coursesErr; ?></span>
            <br><br>
            <label for="Website">Website*:</label><br>
            <input type="text" name="website">
            <span class="error"><?php echo $websiteErr; ?></span>
            <br><br>
            <label for="mobileno">Mobile no*:</label><br>
            <input type="text" name="mobileno">
            <br><br>
            <span class="error">* Mobile no is required <?php echo $mobilenoErr; ?></span>
            <br><br>
            <label for="comments">Any Comments:</label><br>
            <textarea placeholder="Please suggest anything for improvement" class="textarea" name="comments" id=""
                cols="35" rows="15"></textarea>
            <br><br>
            <input type="submit" name="submit" value="Submit"><br><br>
            <input type="reset" name="reset" value="Reset" />
        </form>
    </div>
    </body>

    <body>
        <?php
        if (isset($_POST['submit'])) {
            if (
                $fnameErr == "" && $lnameErr == "" && $ageErr == ""
                && $dobErr == "" && $emailErr == "" && $PasswordErr == "" &&
                $ConfirmErr == "" && $YearErr == "" && $genderErr == "" &&
                $coursesErr == "" && $websiteErr == "" && $mobilenoErr == ""
            ) {
                echo "<h1 style='color: #GF0001;'><h1>You have registered successfully </h1>";
                echo "<br>";
                echo "<h2>Your Input:</h2>";
                echo "First Name: " . $fname;
                echo "<br>";
                echo "Last Name: " . $lname;
                echo "<br>";
                echo "Age: " . $age;
                echo "<br>";
                echo "Dob: " . $dob;
                echo "<br>";
                echo "Email: " . $email;
                echo "<br>";
                echo "Password: " . $Password;
                echo "<br>";
                echo "Confirm: " . $Confirm;
                echo "<br>";
                echo "Year: " . $Year;
                echo "<br>";
                echo "Gender: " . $gender;
                echo "<br>";
                echo "Courses: " . $courses;
                echo "<br>";
                echo "Mobile no: " . $mobileno;
            } else {
                echo "<h3> <b>You didn't fill out the form correctly</b> </h3>";
            }
        }
        ?>
    </body>

</html>
