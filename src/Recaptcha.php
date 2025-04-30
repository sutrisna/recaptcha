<?php

namespace Recaptcha;
use Recaptcha\CaptchaType;
class Recaptcha implements RecaptchaInterface
{
    private static string $captchaText, $captchaNumber;
    private const CAPTCHA_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    public static function setCaptcha(int $length): void
    {
        self::$captchaText = '';
        self::$captchaNumber = '';

        $characterLength = strlen(self::CAPTCHA_CHARACTERS);

        for ($i = 0; $i < $length; $i++) {
            self::$captchaText .= self::CAPTCHA_CHARACTERS[rand(0, $characterLength - 1)];
        }

        for ($i = 0; $i < $length; $i++) {
            self::$captchaNumber .= rand(0, 9);
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['captcha_text'] = self::$captchaText;
        $_SESSION['captcha_number'] = self::$captchaNumber;
    }

    public static function getCaptcha(string $type): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['captcha_text']) || !isset($_SESSION['captcha_number'])) {
            throw new \ErrorException("Set captcha terlebih dahulu");
        }

        $_SESSION['captcha_type'] = $type;

        if ($type === CaptchaType::TEXT) {
            return $_SESSION['captcha_text'];
        }

        if ($type === CaptchaType::NUMBER) {
            return $_SESSION['captcha_number'];
        }

        throw new \InvalidArgumentException("Jenis captcha tidak dikenal");
    }

    public static function captchaImage(string $captcha): void
    {
        header('Content-Type: image/png');
        $image = imagecreatetruecolor(100, 50);

        $bgColor = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $bgColor);

        $textColor = imagecolorallocate($image, 0, 0, 0);

        $font = 5;
        imagestring($image, $font, 10, 15, $captcha, $textColor);

        imagepng($image);
        imagedestroy($image);
        exit;
    }

    public static function verifyCaptcha(string $inputText): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['captcha_type'])) {
            throw new \ErrorException("Session captcha type not set");
        }

        if ($_SESSION['captcha_type'] === CaptchaType::TEXT) {
            return strtolower($inputText) === strtolower($_SESSION['captcha_text'] ?? '');
        }

        if ($_SESSION['captcha_type'] === CaptchaType::NUMBER) {
            return $inputText === ($_SESSION['captcha_number'] ?? '');
        }

        throw new \InvalidArgumentException("Jenis captcha tidak valid");
    }
}
