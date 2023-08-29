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

