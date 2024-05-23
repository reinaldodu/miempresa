<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartamentosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //listar departamentos
    public function test_listar_departamentos()
    {
        $response = $this->get('/departamentos');
        $response->assertStatus(302);
    }
}
