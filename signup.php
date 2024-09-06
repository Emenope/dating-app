<?php
session_start();
include 'conn.php';

$showPopup = false; // Define $showPopup with initial value false
$passwordsMatch = true; // Define $passwordsMatch with initial value true

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];

    // Check if passwords match
    if ($password !== $repeatPassword) {
        $passwordsMatch = false;
    } else {
        $sql = "SELECT * FROM accounts WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $showPopup = true;
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: user_creation.php');
            exit;
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
            margin: 1rem;
            color: #ff1493;
        }
        .logo-image {
            max-width: 15%;
            height: auto;
            position: absolute;
            top: 40px;
            left: 110px;
        }
        .cover-image {
            flex: 1;
            height: 100vh;
            background: url('assets/img/bgimg.png') no-repeat center center;
            background-size: cover;
        }
        h2 {
            margin-bottom: 1rem;
            color: #ff1493;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
            color: #ff1493;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ff1493;
            border-radius: 5px;
            background-color: #fff;
            color: #ff1493;
            box-sizing: border-box; 
        }   
        input[type="submit"] {
            background-color: #ff1493;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #ff69b4;
        }
        .error {
            color: red;
            font-size: 0.8rem;
            text-align: left;
            margin-top: -0.5rem;
            margin-bottom: 0.5rem;
        }
        p {
            margin-top: 1rem;
            color: #ff1493;
        }
        a {
            color: #800080;  
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        @media (min-width: 768px) {
            .container {
                margin-right: 10%;
            }
        }
    </style>
</head>
<body>
<img src="assets/img/logo1.png" alt="Logo" class="logo-image">

<div class="cover-image"></div>
<div class="container">

    <img src="assets/img/logo2.png" alt="Logo" style="max-width: 100%; height: auto;">
    <p>By tapping Create account, you agree to our <a href="terms.html">Terms</a>. Learn how we process your data in our <a href="Privacypolicy.html">Privacy Policy</a>.</p>
        <h2>Create an Aacount</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <?php
            if ($showPopup) {
                echo "<p class='error'>*This email is already registered. Please use a different email.</p>";
            }
            ?>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="repeat_password">Repeat Password:</label>
            <input type="password" id="repeat_password" name="repeat_password" required>
            <?php
            if (!$passwordsMatch) {
                echo "<p class='error'>*Passwords do not match.</p>";
            }
            ?>
            <input type="submit" value="Create account">
        </form>
        <p>Already have an account? <a href="signin.php">Log in</a></p>
    </div>
</body>
</html>
