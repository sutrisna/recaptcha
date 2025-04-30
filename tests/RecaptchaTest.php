<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Recaptcha\CaptchaType;
use Recaptcha\Recaptcha;

final class RecaptchaTest extends TestCase
{
    private $length = 10;

    public function testVerifyCaptcha(): void
    {
        Recaptcha::setCaptcha($this->length);
        $captcha = Recaptcha::getCaptcha(CaptchaType::TEXT);
        $result = Recaptcha::verifyCaptcha($captcha);

        $this->assertTrue($result);
    }

    public function testCaptchaTextLength(): void
    {
        Recaptcha::setCaptcha($this->length);
        $captcha = Recaptcha::getCaptcha(CaptchaType::TEXT);

        $this->assertEquals($this->length, strlen($captcha));
    }

    public function testCaptchaTextIsString(): void
    {
        Recaptcha::setCaptcha($this->length);
        $captcha = Recaptcha::getCaptcha(CaptchaType::TEXT);
        
        $this->assertIsString($captcha);
    }
    
    public function testCaptchaNumberIsString(): void
    {
        Recaptcha::setCaptcha($this->length);
        $captcha = Recaptcha::getCaptcha(CaptchaType::NUMBER);

        $this->assertIsString($captcha);
    }
}
