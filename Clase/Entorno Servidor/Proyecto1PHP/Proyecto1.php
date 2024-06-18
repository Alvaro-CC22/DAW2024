<?php
session_start(); // Iniciar o reanudar la sesión

include 'funciones.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'show':
            showShoppingList();
            break;
        case 'insert':
            showInsertForm();
            break;
        case 'modify':
            showModifyForm();
            break;
        case 'delete':
            showDeleteForm();
            break;
        default:
            echo 'Acción no válida.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Compras</title>
</head>
<body>
    <h1>Lista de Compras</h1>
    
    <h2>Menú</h2>
    <ul>
        <li><a href="Proyecto1.php?action=show">Mostrar lista</a></li>
        <li><a href="Proyecto1.php?action=insert">Insertar</a></li>
        <li><a href="Proyecto1.php?action=modify">Modificar</a></li>
        <li><a href="Proyecto1.php?action=delete">Borrar</a></li>
    </ul>
</body>
</html>