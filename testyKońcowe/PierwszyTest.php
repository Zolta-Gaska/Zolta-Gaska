<?php

declare(strict_types=1);

namespace TestyKońcowe;

use Symfony\Component\Panther\PantherTestCase;

class PierwszyTest extends PantherTestCase
{
    public function testMyApp(): void
    {
	$client = static::createPantherClient([
	    'webServerDir' => __DIR__.'/../publiczny', // the Flex directory structure
	    'port' => 8899,
	    'external_base_url' => 'http://localhost:8899',
	]);

	$client->request('GET', '/');

	// $this::assertPageTitleSame('localhost:8899');
    }
}
