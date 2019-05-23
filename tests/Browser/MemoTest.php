<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class MemoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testMemo()
    {
      $this->browse(function ($first, $second) {

        $first->loginAs(User::find(1));
        $first->visit('memo/create')
              ->type('subject', 'Tayor Otwell')
              ->type('content', 'This is a memo')
              ->select('user_id' ,1)
              ->press('Submit')
              ->assertSee('Memo Submitted');
            });

    }
}
