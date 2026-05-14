<?php

use App\Models\Cita;
use App\Controllers\Http\ContactoController;



// comprobar la existencia de los modelos de citas
test('Existen los modelos de citas', function () {
    $this->assertTrue(class_exists(Cita::class));
});

// Comprobar la existencia del controlador de los contactos
test('Existen los controladores de contactos', function () {
    $this->assertTrue(class_exists(ContactoController::class));
});