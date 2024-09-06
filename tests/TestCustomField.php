<?php

namespace ShoplicKr\Fields\Tests;

use ShoplicKr\Fields\Meta\Meta;
use ShoplicKr\Fields\Module\CustomFields;

class TestCustomField extends \WP_UnitTestCase
{
    public function testCustomField(): void
    {
        $post = $this->factory()->post->create_and_get(['post_type' => 'post']);
        $term = $this->factory()->term->create_and_get(['taxonomy' => 'post_tag']);
        $user = $this->factory()->user->create_and_get();

        $cf = new CustomFields(__DIR__ . '/config-custom-field.php');

        $foo = $cf->getPostMeta('foo');
        $this->assertInstanceOf(Meta::class, $foo);
        $this->assertEquals('foo-default', $foo->get($post));

        $bar = $cf->getTermMeta('bar');
        $this->assertInstanceOf(Meta::class, $bar);
        $this->assertEquals('bar-default', $bar->get($term));

        $baz = $cf->getUserMeta('baz');
        $this->assertInstanceOf(Meta::class, $baz);
        $this->assertEquals('baz-default', $baz->get($user));
    }
}