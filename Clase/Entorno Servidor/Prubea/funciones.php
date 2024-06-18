<?php
function showShoppingList() {
    if (empty($_SESSION['shoppingList'])) {
        echo 'No hay elementos en la lista de compras.';
    } else {
        $shoppingList = $_SESSION['shoppingList'];
        echo '<h2>Lista de Compras</h2>';
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr>';
        $totalPurchasePrice = 0;
        foreach ($shoppingList as $item) {
            $total = $item['quantity'] * $item['price'];
            $totalPurchasePrice += $total;
            echo '<tr>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['quantity'] . '</td>';
            echo '<td>' . $item['price'] . '</td>';
            echo '<td>' . $total . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo 'Precio Total de Compra: ' . $totalPurchasePrice;
    }
}

function showInsertForm() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        
        if (!empty($name) && is_numeric($quantity) && is_numeric($price)) {
            $item = [
                'name' => $name,
                'quantity' => (int)$quantity,
                'price' => (float)$price
            ];
            $_SESSION['shoppingList'][] = $item;
            echo 'Elemento insertado con éxito.';
        } else {
            echo 'Por favor, complete todos los campos con valores válidos.';
        }
    }
    
    echo '<h2>Insertar Elemento</h2>';
    echo '<form method="post" action="index.php?action=insert">';
    echo 'Nombre: <input type="text" name="name"><br>';
    echo 'Cantidad: <input type="text" name="quantity"><br>';
    echo 'Precio: <input type="text" name="price"><br>';
    echo '<input type="submit" value="Insertar">';
    echo '</form>';
}
function showModifyForm() {
    

    echo '<h2>Modificar Elemento</h2>';
    echo '<form method="post" action="index.php?action=modify">';
    echo 'Selecciona un elemento:';
    echo '<select name="index">';
    
    if (!empty($_SESSION['shoppingList'])) {
        $shoppingList = $_SESSION['shoppingList'];
        foreach ($shoppingList as $key => $item) {
            echo "<option value='$key'>{$item['name']}</option>";
        }
    }
    
    echo '</select>';
    echo '<input type="submit" value="Seleccionar">';
    echo '</form>';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $index = (int)$_POST['index'];
        if (isset($_SESSION['shoppingList'][$index])) {
            $item = $_SESSION['shoppingList'][$index];
            $name = isset($item['name']) ? $item['name'] : '';
            $quantity = isset($item['quantity']) ? $item['quantity'] : '';
            $price = isset($item['price']) ? $item['price'] : '';
            echo '<form method="post" action="index.php?action=modify">';
            echo 'Nombre: <input type="text" name="name" value="' . $name . '"><br>';
            echo 'Cantidad: <input type="text" name="quantity" value="' . $quantity . '"><br>';
            echo 'Precio: <input type="text" name="price" value="' . $price . '"><br>';
            echo '<input type="hidden" name="index" value="' . $index . '">';
            echo '<input type="submit" value="Modificar">';
            echo '</form>';
        } else {
            echo 'El elemento seleccionado no existe.';
        }
    }
}
function showDeleteForm() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['index'])) {
        $index = (int)$_POST['index'];
        if (isset($_SESSION['shoppingList'][$index])) {
            unset($_SESSION['shoppingList'][$index]);
            $_SESSION['shoppingList'] = array_values($_SESSION['shoppingList']);
            echo 'Elemento eliminado con éxito.';
        } else {
            echo 'El elemento seleccionado no existe.';
        }
    }

    echo '<h2>Borrar Elemento</h2>';
    echo '<form method="post" action="index.php?action=delete">';
    echo 'Selecciona un elemento:';
    echo '<select name="index">';
    
    if (!empty($_SESSION['shoppingList'])) {
        $shoppingList = $_SESSION['shoppingList'];
        foreach ($shoppingList as $key => $item) {
            echo "<option value='$key'>{$item['name']}</option>";
        }
    }
    
    echo '</select>';
    echo '<input type="submit" value="Eliminar">';
    echo '</form>';
}