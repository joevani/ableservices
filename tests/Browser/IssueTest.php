<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class IssueTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSubmitIssue()
    {
      $this->browse(function ($first, $second) {


        $first->loginAs(User::find(1));
        $first->visit('new_ticket')
              ->type('title', 'My Issue')
              ->type('message', 'This my test')
              ->select('category' ,'Lack of Tools')
              ->select('priority','High')
              ->press('Submit')
              ->assertSee('Submit');
            });


    }
}
