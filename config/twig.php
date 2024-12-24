<?php

namespace Config;
require_once __DIR__ ."/../Helpers.php";
use Helpers;

class TwigConfig
{
    private \Twig\Environment $twig;

    public function __construct(string $path, bool $isProduction = false)
    {
        $loader = new \Twig\Loader\FilesystemLoader($path);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => $isProduction ? 'path/to/cache' : false,
            'debug' => !$isProduction,
        ]);
        $lexer = new \Twig\Lexer($this->twig, array($this->helpers()));
        $this->twig->setLexer($lexer);
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }
    private function helpers(): void{
        array(
            $this->twig->addFunction(
                new \Twig\TwigFunction('url', function(string $url=null) {
                     return Helpers::url($url);
                }
            )), 
            $this->twig->addFunction(
                new \Twig\TwigFunction('redirecionar', function(string $url=null) {
                return Helpers::redirecionar($url);
            }
            ))
        );
    }
}
