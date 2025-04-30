<?php
namespace Recaptcha;

interface RecaptchaInterface
{
    /**
     * Set captcha text.
     *
     * @param int $length panjang captcha
     * @return void
     */
    public static function setCaptcha(int $length): void;
    
    /**
     * Get captcha set property text or number.
     *
     * @param string $type Tipe captcha yang diinginkan (CaptchaType::TEXT atau CaptchaType::NUMBER)
     * @return string
     */
    public static function getCaptcha(string $type): string;

    /**
     * Generator captcha image.
     *
     * @param string $captcha hasil dari get captcha
     * @return void
     */
    public static function captchaImage(string $captcha): void;
    
    /**
     * Mencocokan hasil captcha
     * 
     * @param string $inputan  inputan user
     * @return boolean
     */
    public static function verifyCaptcha(string $inputan): bool;
}
