<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"]; 
    $confirm_password = $_POST["confirm_password"];

    $errors = [];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $errors[] = "Все поля обязательны для заполнения.";
    }

    if ($password != $confirm_password) {
        $errors[] = "Пароли не совпадают.";
    }

    if (strlen($username) < 3) {
        $errors[] = "Имя пользователя должно быть не менее 3 символов.";
    }

    if (strlen($password) < 6) { 
        $errors[] = "Пароль должен быть не менее 6 символов.";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
        echo "<p>Registration successful!</p>";
        echo "<p>Username:" . htmlspecialchars($username) . "</p>";
        echo "<p>Hashed password:" . htmlspecialchars($hashed_password) . "</p>"; 
        }
}
?>