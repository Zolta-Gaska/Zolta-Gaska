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

    public function uruchomienieTestowe(): void
    {
        echo 'Jądro::uruchomienieTestowe()';
    }

    private function czytajŚcieżki(): void
    {
        $folderŚcieżek = '';
    }
}

