<?php

declare(strict_types=1);

namespace ŻółtaGąska;

class Jądro
{
    public function uruchom(): void
    {
        $linki = $this->czytajLink();
        $scieżki = $this->czytajŚcieżki();

        $this->generujOdpowiedź($linki['linki'], $scieżki);
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

    /**
     * @return array<string, mixed>
     */
    private function czytajLink(): array
    {
        $link = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $tablicaLinków = [];
        if ($link !== null) {
            $tablicaLinków = array_filter(explode('/', $link));
        }
        if (empty($tablicaLinków)) {
            $tablicaLinków = ['index.html'];
        }

        $żądanie = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $tablicaParametrów = [];
        if ($żądanie !== null) {
            $tablicaParametrów = array_filter(explode('&', $żądanie));
        }

        return [
            'linki' => array_values($tablicaLinków),
            'parametry' => array_values($tablicaParametrów),
        ];
    }

    private function generujOdpowiedź(array $linki, array $ścieżki): void
    {
        foreach ($ścieżki as $ścieżka) {
            $częściŚcieżki = array_filter(explode('.', $ścieżka));

            if ($linki[0] === $częściŚcieżki[0]
                || $linki[0] === $częściŚcieżki[0] . '.' . $częściŚcieżki[1]
            ) {
                include $this->zwróćGłównyFolder() . 'ścieżki/' . $ścieżka;
                return;
            }
        }

        http_response_code(404);
        echo 'ERROR 404';
    }

    private function zwróćGłównyFolder(): string
    {
        return __DIR__ . '/../';
    }

    /**
     * @return array<mixed>
     */
    private function czytajŚcieżki(): array
    {
        $pliki = [];
        $folderŚcieżek = $this->zwróćGłównyFolder() . 'ścieżki/';

        foreach (scandir($folderŚcieżek) as $zeskanowany) {
            $scieżkaPliku = $folderŚcieżek . $zeskanowany;

            if (is_file($scieżkaPliku)) {
                $pliki[] = $zeskanowany;
            }
        }

        return $pliki;
    }

    private function l(): void
    {
        echo '<br><br>';
    }
}

