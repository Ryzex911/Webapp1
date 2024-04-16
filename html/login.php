<?php
session_start();


if (isset($_SESSION['username'])) {
    header('Location: admin.php');
    exit();
}


if (isset($_POST['loggingIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "Rio" && $password == "Ryzex2028") {
        $_SESSION['username'] = $username;
        header('Location: admin.php');
        exit();
    } else {
        $error_message = "Login was not successful";
    }
}

require_once("conction.php");
require_once "header.php";
?>

<body class="login-page">
<?php if(isset($error_message)) { ?>
    <p class="error-text"><?php echo $error_message; ?></p>
<?php } ?>
<form class="method-login" method="post" action="">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input class="login-btn" type="submit" name="loggingIn" value="Login">
</form>
</body>
