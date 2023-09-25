<?php

declare(strict_types=1);

namespace ŻółtaGąska;

use PHPUnit\Framework\TestCase;

class JądroTest extends TestCase
{
    public function offtestL(): void
    {
        $jądro = new Jądro();

        $this::assertEquals('<br><br>', $jądro->pokażDebug());
    }
}
