<?php

// 1. Убедиться что мы открыли нужный файл
// echo "Hello form mail PHP!";

// 2. Распечатываем полученные данный из формы (которые находятся в $_POST массиве)
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// 3. Можем распечатать по отдельности элементы из $_POST массива
// echo $_POST['name'];
// echo "<br>";
// echo $_POST['email'];
// echo "<br>";
// echo $_POST['message'];
// echo "<br>";

$mail_to = "info@hudeem-pp.ru"; // Email куда будет отправлено письмо
$email_from = "b.medvedev@shop-chop.ru"; // Указываем от кого будет отправлено письмо, email, reply to
$name_from = "Личный сайт портфолио"; // Указываем от кого будет отправлено письмо, имя
$subject = "Сообщение с сайта!"; // Тема письма

// Формируем текст письма
$message =  "Вам пришло новое сообщение с сайта: <br><br>\n" .
    "<strong>Имя отправителя:</strong>" . strip_tags(trim($_POST['name'])) . "<br>\n" .
    "<strong>Email отправителя: </strong>" . strip_tags(trim($_POST['phone'])) . "<br>\n" .
    "<strong>Сообщение: </strong>" . strip_tags(trim($_POST['message']));

// Формируем тему письма, специально обрабатывая её
$subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

// Формируем заголовки письма
$headers = "MIME-Version: 1.0" . PHP_EOL .
    "Content-Type: text/html; charset=utf-8" . PHP_EOL .
    "From: " . "=?utf-8?B?" . base64_encode($name_from) . "?=" . "<" . $email_from . ">" .  PHP_EOL .
    "Reply-To: " . $email_from . PHP_EOL;

// Отправляем письмо
$mailResult = mail($mail_to, $subject, $message, $headers);

if ($mailResult) {
    // Перенаправляем на страницу "Спасибо"
    header('location: thankyou.html');
} else {
    header('location: error.html');
}
