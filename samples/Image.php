<?php
error_reporting(E_ALL);

require_once __DIR__ . '/Bootstrap.php';

use Recaptcha\Recaptcha;
use Recaptcha\CaptchaType;

Recaptcha::setCaptcha(5);
Recaptcha::captchaImage(Recaptcha::getCaptcha(CaptchaType::TEXT));
