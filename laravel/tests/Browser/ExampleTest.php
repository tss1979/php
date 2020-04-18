<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testNewsCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->type('title', 'Новость№1')
                ->type('text', 'лучшая новость')
                ->type('category_id', 3)
                ->press('add')
                ->assertPathIs('/admin/index');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->type('title', 'Новость№1')
                ->type('text', 'лу')
                ->type('category_id', 3)
                ->press('add')
                ->assertSee('Количество символов в поле Текст новости должно быть не менее 5');
        });

    }

    public function testCategoryCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('name', 'ghhjgk')
                ->type('slug', 'лучшая новость')
                ->press('add_category')
                ->assertPathIs('/admin/index')
                 ->assertSee('Поле Псевдоним категории может содержать только буквы.');
        });
    }
}
