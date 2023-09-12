<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /* O refreshdabatase é importante para que o que a cada teste, o banco de dados seja redefinido, impedindo que os testes
       posteriores não sejam prejudicados.
    */

    use CreatesApplication, RefreshDatabase;
}
