<?php

namespace Ownable\Tests;

use Ownable\Tests\Models\Post;
use Ownable\Tests\Models\User;
use Ownable\Tests\Models\Other;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OwnsModelsTraitTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        factory(User::class, 2)
            ->create()
            ->each(function ($user) {
                $post = $user->posts()->save(factory(Post::class)->make());

                $post->others()->save(factory(Other::class)->make());
            });
    }

    public function testOwnsMethod()
    {
        $user = User::first();
        $posts = Post::all();

        $this->assertTrue($user->owns($posts->first()));
        $this->assertFalse($user->owns($posts->first(), 'other_key'));
        $this->assertFalse($user->owns($posts->last()));
    }

    public function testdoesntOwnMethod()
    {
        $user = User::first();
        $posts = Post::all();

        $this->assertFalse($user->doesntOwn($posts->first()));
        $this->assertTrue($user->doesntOwn($posts->last()));
        $this->assertTrue($user->doesntOwn($posts->first(), 'other_key'));
    }

    public function testItShouldUseTheInterfaceImplementationIfClassImplementsInterface()
    {
        $otherModels = Other::all();
        $user = User::first();

        $this->assertTrue($user->owns($otherModels->first()));
        $this->assertFalse($user->owns($otherModels->last()));
    }

    public function testItShouldOverrideTheContractAndUserTheRegularValidation()
    {
        $otherModels = Other::all();
        $user = User::first();

        $this->assertFalse($user->owns($otherModels->first(), null, true));
        $this->assertFalse($user->owns($otherModels->last(), null, true));
        $this->assertTrue($user->doesntOwn($otherModels->last(), null, true));
    }
}
