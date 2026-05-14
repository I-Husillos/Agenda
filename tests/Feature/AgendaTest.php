<?php

// comprobar la existencia de los modelos de citas
test('Existen los modelos de citas', function () {
    $this->assertTrue(class_exists(App\Models\Cita::class));
});

