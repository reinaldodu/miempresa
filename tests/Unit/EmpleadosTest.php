<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EmpleadosTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // Listar empleados
    public function test_listar_empleados()
    {
        $response = $this->get('/empleados');
        $response->assertStatus(302);
    }
    // Crear empleado
    public function test_crear_empleado()
    {
        $response = $this->post('/empleados/create', [
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'documento' => '123456',
            'telefono' => '123456',
            'direccion' => 'Calle 123',
            'departamento_id' => 1,
            'email' => 'juanp@email.co',
        ]);
        $response->assertStatus(405);
    }
    //eliminar empleado
    public function test_eliminar_empleado()
    {
        $response = $this->delete('/empleados/100');
        $response->assertStatus(302);
    }
}