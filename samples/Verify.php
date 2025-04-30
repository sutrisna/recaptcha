<?php
error_reporting(E_ALL);
require_once __DIR__ . '/Bootstrap.php';

use Recaptcha\Recaptcha;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text_inputan_user = $_POST['captchaText'];

    $result =  Recaptcha::verifyCaptcha($text_inputan_user);
    echo $result ? "Captcha valid" : "Captcha tidak valid !";
}
