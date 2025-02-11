<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $errors = [];

    if (empty($name) || empty($email) || empty($message)) {
        $errors[] = "Все поля обязательны для заполнения.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неверный формат электронной почты.";
    }

    if (strlen($message) < 10) {
        $errors[] = "Сообщение должно быть не менее 10 символов.";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Спасибо за ваш отзыв!</p>";
        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
        echo "<p>Message: " . htmlspecialchars($message) . "</p>";
    }
}
?>