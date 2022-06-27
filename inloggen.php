<?php 
if (isset($_POST['submit'])){
    require('config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $permission = $_POST['permission'];

    $sql = "INSERT INTO gebruikers (username, password)
    VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('met succes toegevoegt.')</script>";
    } else {
        echo "<script>alert('niet toegevoegt')</script>";
    }
}

$error = "";
if (isset($_POST['loginsubmit'])){
    require('config.php');

    if (!empty($_POST['username']) && !empty($_POST['pass'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $sql = "SELECT * FROM gebruikers WHERE username = '".$username."' AND `password` = '".$password."'"; 
        if($result = $conn->query($sql)) {

            $aantal = $result->num_rows;
            if($aantal == 1) {
                session_start();
                $_SESSION['ingelogd'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: index.php");
            }else{
                $error = "gegevens onjuist";
            }
        }

        
    } else {
        $error = "Username & password zijn verplicht";
    }
}

?>
<html>
<head>
    <title>Login formulier</title>
    <link rel="stylesheet" type="text/css" href="css/inloggen.css">
    <link rel="stylesheet" type="text/css" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<a href="index.php" id="terug">Terug naar de homepage</a>

<div class="container">
<div class="login-box">
<div class="row">
<div class="col-md-6 login-left">
<h2> Inloggen </h2>
<form method="POST">
<div class="form-group">
<label>Gebruikersnaam</label>
<input type="text" name="username" class="form-control" required>
</div>
<div class="form-group">
<label>Wachtwoord</label>
<input type="password" name="pass" class="form-control" required>
</div>
<input name="loginsubmit" type="submit" class="btn btn-primary" value="Inloggen">
</form>
</div>

<div class="col-md-6 login-right">
<h2> Aanmelden </h2>
<form method="POST">
<div class="form-group">
<label>Gebruikersnaam</label>
<input type="text" name="username" class="form-control" required>
</div>
<div class="form-group">
<label>Wachtwoord</label>
<input type="password" name="password" class="form-control" required>
</div>
<input type="submit" name="submit" class="btn btn-primary" value="Aanmelden">
</form>
</div>

</div>

</div>

</div>
</body>
</html>
