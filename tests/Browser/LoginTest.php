<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testLogin()
       {

           $this->browse(function ($first, $second) {
                 $first->loginAs(User::find(1))
                       ->visit('http://localhost:8000/dashboard')
                       ->assertPathIs('/dashboard');
             });




       }
}
