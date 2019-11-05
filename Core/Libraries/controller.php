<?php

namespace Core\libraries;

class Controller
{
    public function __construct()
    {
        $whoops = new \Whoops\Run;
        $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
    public function render($view, $data = [])
    {
        if (file_exists("../App/Views/" . $view . ".twig")) {
            $loader = new \Twig\Loader\FilesystemLoader("../App/Views");
            $twig = new \Twig\Environment($loader);

            // require_once "../App/Views/" . $view . ".twig";
            echo $twig->render($view . ".twig", $data);
        } else {
            throw new \Exception("$view is not found");
        }
    }
}
