<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <div class="container">
        <div class="form-box box">


            <?php

            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $age = $_POST["age"];
                $password = $_POST["password"];

                //verify the unique email
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                    <p> This email is used, Try another One Please! </p>
                    </div>";

                    echo "<a href='javascript:self.history.back()>
                    <button class='btn'>
                    Go Back
                    </button>
                    </a>";
                } else {
                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");

                    echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button>";
                }
            } else {
            ?>




                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" autocomplete="off" id="username" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" autocomplete="off" id="email" required>
                    </div>

                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" autocomplete="off" id="age" required>
                    </div>

                    <div class="field input">
                        <label for="password">Passsword</label>
                        <input type="password" name="password" autocomplete="off" id="password" required>
                    </div>

                    <div class="field ">
                        <input class="btn" type="submit" autocomplete="off" name="submit" value="Login" id="username" required>
                    </div>

                    <div class="links ">
                        Already a member? <a href="index.php">Sign In</a>
                    </div>
                </form>
        </div>
        <?php } ?>;
    </div>
</body>

</html>