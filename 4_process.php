<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);

    $errors = [];

    if (empty($email)) {
        $errors[] = "Электронная почта обязательна для заполнения.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неверный формат электронной почты.";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        // In a REAL application, you would add the email to a mailing list (e.g., in a database).
        echo "<p>Спасибо за подписку!</p>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    }
}
?>