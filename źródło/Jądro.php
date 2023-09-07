<?php

declare(strict_types=1);

namespace ŻółtaGąska;

class Jądro
{
    private $ścieżki = [];

    public function __construct()
    {
        echo 'Jądro skonstrułowane!!!';
    }

    public function uruchom(): void
    {
        echo 'Jądro::uruchomienieTestowe()';
        $this->l();
        echo $this->zwróćGłównyFolder();
        
        $this->czytajLink();
        $this->czytajŚcieżki();
        $this->generujOdpowiedź();
    }

    public function pokażDebug(): void
    {
        $this->l();
        echo '$_SERVER';
        $this->l();
        var_dump($_SERVER);
        $this->l();
        echo '$_SESSION';
        $this->l();
        var_dump($_SESSION);
        $this->l();
        echo '$_GET';
        $this->l();
        var_dump($_GET);
        $this->l();
        echo '$_POST';
        $this->l();
        var_dump($_POST);
        $this->l();
        echo '$GLOBALS';
        $this->l();
        var_dump($GLOBALS);
        $this->l();
    }

    private function czytajLink(): void
    {
        $tablicaLinków = [];

        $ścieżka = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $tablicaŚcieżek = explode('/', $ścieżka);

        $żądanie = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $tablicaParametrów = [];
        if ($żądanie !== null) {
            $tablicaParametrów = explode('&', $żądanie);
        }
        // $fragment = parse_url($_SERVER['REQUEST_URI'], PHP_URL_FRAGMENT);

        $this->l();
        var_dump($ścieżka);
        $this->l();
        print_r($tablicaŚcieżek);
        $this->l();
        var_dump($żądanie);
        $this->l();
        print_r($tablicaParametrów);
        $this->l();

        // return $tablicaLinków;
    }

    private function generujOdpowiedź(): void
    {
    }

    private function zwróćGłównyFolder(): string
    {
        return __DIR__ . '/../';
    }

    private function czytajŚcieżki(): void
    {
        $pliki = [];
        $folderŚcieżek = $this->zwróćGłównyFolder() . 'ścieżki/';

        foreach (scandir($folderŚcieżek) as $zeskanowany) {
            $scieżkaPliku = $folderŚcieżek . $zeskanowany;

            if (is_file($scieżkaPliku)) {
                $pliki[] = $zeskanowany;
            }
        }

        var_dump($pliki);
    }

    private function l(): void
    {
        echo '<br><br>';
    }
}

