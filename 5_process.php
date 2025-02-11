<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);

    $errors = [];

    if (empty($name) || empty($date) || empty($time)) {
        $errors[] = "Все поля обязательны для заполнения.";
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
        $errors[] = "Неверный формат даты (ГГГГ-ММ-ДД).";
    }

    if (!preg_match("/^\d{2}:\d{2}$/", $time)) {
        $errors[] = "Неверный формат времени (ЧЧ:ММ).";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Бронирование прошло успешно!</p>";
        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>Date: " . htmlspecialchars($date) . "</p>";
        echo "<p>Time: " . htmlspecialchars($time) . "</p>";
    }
}
?>