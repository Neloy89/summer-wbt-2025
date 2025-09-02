<!DOCTYPE HTML>
<html>  
<body>

<form method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    echo "Name: $name<br>";
    echo "E-mail: $email<br>";
}
?>

</body>
</html>