<?php

namespace ShoplicKr\Fields\Tests;

use ShoplicKr\Fields\Module\Options;
use ShoplicKr\Fields\Option\Option;

class TestModuleOptions extends \WP_UnitTestCase
{
    public function testOptions(): void
    {
        $op = new Options(__DIR__ . '/config-options.php');

        $foo = $op->getOption('opt_foo');
        $this->assertInstanceOf(Option::class, $foo);
        $this->assertEquals('opt_foo_default', $foo->get());
    }
}