<?php

namespace App\Helpers;

class Helpers
{
    public static function generateString(): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $shortCode = '';
        for ($i = 0; $i < 6; $i++) {
            $shortCode .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $shortCode;
    }
}
