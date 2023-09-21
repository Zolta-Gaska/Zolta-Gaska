<?php

declare(strict_types=1);

namespace KoniecKońców;

use Symfony\Component\Panther\PantherTestCase;

class PierwszyTest extends PantherTestCase
{
    public function testMyApp(): void
    {
	$client = static::createPantherClient([
	    'external_base_url' => 'http://localhost:8899',
	]);

	$client->request('GET', '/');

	$this->assertPageTitleSame('localhost:8899');
    }
}
