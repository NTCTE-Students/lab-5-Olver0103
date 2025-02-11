<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];

    $errors = [];

    if (empty($username) || empty($password)) {
        $errors[] = "Все поля обязательны для заполнения.";
    }

    if (strlen($username) < 4) {
        $errors[] = "Все поля обязательны для заполнения.";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        if ($username == "testuser" && $password == "password"){
            echo "<p>Вход выполнен успешно!</p>";
        } else {
            echo "<p>Неверное имя пользователя или пароль.</p>";
        }

    }
}
?>