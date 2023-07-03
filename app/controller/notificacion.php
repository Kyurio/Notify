<?php

include __DIR__ . '/../../app/model/Notify.php';
use app\model\Notify;

// Crear una instancia de la clase que contiene la función getById
$objeto = new Notify();

// Obtener el ID del usuario (puedes obtenerlo de una solicitud HTTP, por ejemplo)
$idUsuario = $_GET['id']; // Ajusta según cómo obtienes el ID en tu aplicación

try {
    // Llamar a la función getById y obtener el resultado
    $result = $objeto->getById($idUsuario);

    // Acceder al número de rutas pendientes en el resultado
    $numRutasPendientes = $result['num_rutas_pendientes'];

    // Hacer lo que necesites con el número de rutas pendientes
    echo "El usuario con ID $idUsuario tiene $numRutasPendientes rutas pendientes.";
} catch (Exception $e) {
    // Manejar cualquier excepción ocurrida durante la obtención del registro por ID
    echo "Error al obtener el registro por ID: " . $e->getMessage();
}
?>
