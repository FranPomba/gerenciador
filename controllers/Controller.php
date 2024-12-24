<?php

namespace controllers;

require_once __DIR__ . '/../config/twig.php';

use config\TwigConfig;

class Controller
{
    protected TwigConfig $template;
    public function __construct(string $path, bool $isProduction = false)
    {
        $this->template = new TwigConfig($path, $isProduction);
    }

    public function render(string $template, array $data = []): void
    {
        echo $this->template->render($template, $data);
    }
}
