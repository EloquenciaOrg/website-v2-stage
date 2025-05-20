<?php

namespace App\Services;

class Captcha
{
    public function generateCaptcha(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['captcha'] = mt_rand(1000, 9999);
        $img = imagecreate(65, 30);

        // Assure-toi que le chemin de la police est correct
        $font = public_path('assets/Destroy.ttf');

        $bg = imagecolorallocate($img, 255, 255, 255);
        $textColor = imagecolorallocate($img, 0, 0, 0);

        imagettftext($img, 23, 0, 3, 30, $textColor, $font, $_SESSION['captcha']);

        header('Content-Type: image/jpeg');
        imagejpeg($img);
        imagedestroy($img);
    }

    public function checkCaptcha($input): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION['captcha']) && $input == $_SESSION['captcha'];
    }
}
