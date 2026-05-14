<?php

use App\Http\Controllers\ContactosController;
use App\Models\Citas;

// comprobar la existencia de los modelos de citas
test('Existen los modelos de citas', function () {
    $this->assertTrue(class_exists(Citas::class));
});

// Comprobar la existencia del controlador de los contactos
test('Existen los controladores de contactos', function () {
    $this->assertTrue(class_exists(ContactosController::class));
});

// Comprobar que devuelve las citas en orden descendente respecto a la fecha de creación
test('devuelve las citas en orden descendente respecto a la fecha de creación', function () {
    $citaAntigua = Citas::factory()->create([
        'titulo' => 'Cita antigua',
        'created_at' => now()->subDays(3),
    ]);

    $citaReciente = Citas::factory()->create([
        'titulo' => 'Cita reciente',
        'created_at' => now(),
    ]);

    $response = $this->get(route('citas.index'));

    $response->assertStatus(200)
        ->assertSeeInOrder([
            $citaReciente->titulo,
            $citaAntigua->titulo,
        ]);
});