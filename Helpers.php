<?php

class Helpers{
    public static function url($url = null): string
    {
        $protocolo = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https://" : "http://";
        $host = getenv('HTTP_HOST') !== false ? getenv('HTTP_HOST') : $_SERVER['HTTP_HOST'];
        return 'http://' . $host . '/' . $url;
    }

    public static function redirecionar(string $url = null): void
    {
        header('HTTP/1.1 302 found');
        $local = ($url ? self::url($url) : self::url());
        header("Location: {$local} ");
        exit();
    }

    public static function validarUrl(string $url)
    {
        if (strlen($url) < 10) {
            return false;
        }
        if (!str_contains($url, ".")) {
            return false;
        }
        if (str_contains($url, "http://") || str_contains($url, "https://")) {
            return true;
        }
        return false;
    }
}