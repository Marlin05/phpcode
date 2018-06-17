<?php
    /* https://github.com/PHPMailer/PHPMailer */
    require_once 'phpmailer_class.php';
    //платные сервера SMTP для отправки писем - amazon, либо стандартные- Poctfix или Sendmail на сервере.
    // чтобы отправить 1 письмо 100 поль.лучше запустить в цикле mail
    
    $mail = new PHPMailer();// создаём объект
    $mail->CharSet = 'utf-8';
    $mail->setFrom('admin@mysite.local', 'Администратор'); // от кого письмо
    $mail->addAddress('joe@example.net', 'Joe User'); // кому
    $mail->addReplyTo('info@example.com', 'Information'); // кому отпр.при попытке отпр.ответ
    $mail->addAttachment('a.jpg'); // картинка в дир.
    $mail->isHTML(true); // письмо должно отпр.и в html форм.
    $mail->Subject = 'Тема';
    $mail->Body = 'Текст <b>письма</b>.'; // в html формате
    $mail->AltBody = 'Текст письма.'; // просто text формат
    if($mail->send()) { // метод send возвр.true если всё отпр. или false
        echo 'Письмо успешно отправлено!';
    } else {
        echo 'Письмо не отправлено!';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    // письмо сохр. D:\Open Server\OpenServer\userdata\temp\email
?>
