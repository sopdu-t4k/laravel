<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckCategoryIndex(): void
    {
        $view = $this->view('admin.categories.index', ['title' => 'Some']);

        $view->assertSee('Some');
    }

    public function testCheckCategoryCreate(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertViewIs('admin.categories.create');
    }
}
