<?php

use App\Models\Cita;
use App\Controllers\Http\CitaController;



// comprobar la existencia de los modelos de citas
test('Existen los modelos de citas', function () {
    $this->assertTrue(class_exists(Cita::class));
});

// Comprobar la existencia del controlador de los contactos
test('Existen los controladores de citas', function () {
    $this->assertTrue(class_exists(CitaController::class));
});