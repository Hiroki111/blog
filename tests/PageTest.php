<?php

class PageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeedingPosts()
    {
        $this->assertTrue(true);
        $this->visit('/')
            ->dontSee('No blogs are available');
    }
}
