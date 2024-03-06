<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы подписки
    $email = $_POST["email"];
    $selectedItems = isset($_POST["items"]) ? $_POST["items"] : [];

    // Заголовки письма
    $to = "POLITECH@GMAIL.COM";
    $subject = "Подписка на рассылку";
    
    // Составление тела письма
    $messageBody = "Здравствуйте!\n\nВы успешно подписались на рассылку.\nВыбранные пункты:\n";
    foreach ($selectedItems as $item) {
        $messageBody .= "- $item\n";
    }

    // Отправка письма
    if (mail($to, $subject, $messageBody, "From: $email")) {
        $response = [
            "success" => true,
            "message" => "Письмо успешно отправлено!",
            "additionalMessage" => $messageBody  // Добавляем дополнительное сообщение для отображения
        ];
        echo json_encode($response);
    } else {
        $response = [
            "success" => false,
            "message" => "Ошибка при отправке письма."
        ];
        echo json_encode($response);
    }
}
?>
