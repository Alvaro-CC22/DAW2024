<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenido Administrador</h1>
    <!-- Navigation form to select actions -->
    <form id="menuNav" method="post" action="index.php">
        <input type="submit" name="action" value="CONSULTA"><br>
        <input type="submit" name="action" value="INSERCION"><br>
        <input type="submit" name="action" value="MODIFICACION"><br>
        <input type="submit" name="action" value="ELIMINACION">
    </form><br>

    <?php
    // Include the functions file and connect to the database
    include("funciones.php");
    connectDB();

    // Check if an action has been selected
    if (isset($_POST['action'])) {

        $action = $_POST['action'];

        // Perform actions based on the selected option
        if ($action === 'CONSULTA') {
            showConsultForm(); // Function to show the query form
            echo "<br>";
        } elseif ($action === 'INSERCION') {
            selectInsert("eleinsert"); // Function to show the insertion form
            echo "<br>";
        } elseif ($action === 'MODIFICACION') {
            searchModify(); // Function to search for data to modify
            echo "<br>";
        } elseif ($action === "ELIMINACION") {
            selectInsert("eleinsert2"); // Function to show the delete form
            echo "<br>";
        }
    }

    // Perform actions based on the selected options after the main form
    if(isset($_POST["code"])) {
        consultData(); // Function to consult specific data
    } elseif(isset($_POST["code2"])) {
        showModifyData(); // Function to show data to modify
    } elseif(isset($_POST["Mostrartodo"])) {
        consultAll(); // Function to consult all data
    }

    if(isset($_POST["datostabla"])) {
        modifyForm(); // Function to display modification form
    }

    if(isset($_POST["nuevosDatos"])) {
        modifyData(); // Function to modify data
    }

    if(isset($_POST["eleinsert"])) {
        insertForm(); // Function to show insertion forms
    }

    if(isset($_POST["eleinsert2"])) {
        showDeleteData(); // Function to show data to delete
    }

    if(isset($_POST["datosNuevos"])) {
        insertData(); // Function to insert new data
    }

    // Perform actions based on the selected options to delete data
    if(isset($_POST["datostablaBoComercial"]) || isset($_POST["datostablaBoProducto"]) || isset($_POST["datostablaBoVenta"])) {
        deleteData(); // Function to delete data from different tables
    }
    ?>
</body>

</html>