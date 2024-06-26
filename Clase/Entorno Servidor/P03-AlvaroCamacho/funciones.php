<?php
// Function to connect to the database
function connectDB()
{
      // Database connection details
    $dsn = "mysql:host=localhost;dbname=ventas_comerciales";
    $usuario = "admin";
    $contrasena = "nimda";

    try {
         // Create a PDO connection
        $conexion = new PDO($dsn, $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        // Handling connection errors
        echo ("Error de conexión: " . $e->getMessage());
    }
}

function showConsultForm()
{
    echo "<h2>Consulte sus datos</h2>
            <form method='post' action='index.php'>
                Código del comercial: <input type='text' name='code' required><br>
                <input type='submit' value='Buscar'>
            </form>
            <form method='post' action='index.php'>
                <input type='submit' name='Mostrartodo' value='Mostrar todo'>
            </form>";
}

// Display a form to modify data
function modifyForm()
{
    if (isset($_POST["salario"])) {
        echo "
<form method='post' action='index.php'>
<h2>Edite su comercial</h2>
    <label for='nombre'>Nombre:</label>
    <input type='text' name='nombre' value='" . $_POST['nombre'] . "'><br>

    <label for='salario'>Salario:</label>
    <input type='text' name='salario' value='" . $_POST['salario'] . "'><br>

    <label for='hijos'>Hijos:</label>
    <input type='text' name='hijos' value='" . $_POST['hijos'] . "'><br>

    <label for='fNacimiento'>Fecha de Nacimiento:</label>
    <input type='text' name='fNacimiento' value='" . $_POST['fNacimiento'] . "'><br>
    
    <input type='hidden' name='code3' value='" . $_POST['code'] . "'>

    <input type='submit' name='nuevosDatos' value='ACEPTAR'>
</form>";
    } elseif (isset($_POST["descripcion"])) {
        echo "<h2>Edite su producto</h2>
<form method='post' action='index.php'>
    <label for='nombre'>Nombre:</label>
    <input type='text' name='nombre' value='" . $_POST['nombre'] . "'><br>

    <label for='descripcion'>Descripcion:</label>
    <input type='text' name='descripcion' value='" . $_POST['descripcion'] . "'><br>

    <label for='precio'>Precio:</label>
    <input type='text' name='precio' value='" . $_POST['precio'] . "'><br>

    <label for='descuento'>Descuento:</label>
    <input type='text' name='descuento' value='" . $_POST['descuento'] . "'><br>

    <input type='hidden' name='referencia' value='" . $_POST['referencia'] . "'>
    <input type='hidden' name='code3' value='" . $_POST['code'] . "'>
    
    <input type='submit' name='nuevosDatos' value='ACEPTAR'>
</form>";
    } elseif (isset($_POST["cantidad"])) {
        echo "<h2>Edite la venta</h2>
<form method='post' action='index.php'>
    <label for='nombrepro'>Cantidad:</label>
    <input type='text' name='cantidad' value='" . $_POST['cantidad'] . "'><br>

    <label for='descripcion'>Fecha:</label>
    <input type='text' name='fecha' value='" . $_POST['fecha'] . "'><br>
    <input type='hidden' name='code3' value='" . $_POST['code'] . "'>

    <input type='submit' name='nuevosDatos' value='ACEPTAR'>
</form>";
    }
}

function searchModify()
{
    echo "<h2>Elija el código de los datos que quiere modificar</h2>
            <form method='post' action='index.php'>
                Código del comercial: <input type='text' name='code2' required><br>
                <input type='submit' value='Buscar'>
            </form>";
}

function selectInsert($value)
{
    echo " <form method='post' action='index.php'>
    <h2>Elije qué quieres introducir</h2>

    <label>
        <input type='radio' name='eleccion' value='Comercial'> Comercial
    </label>
    <br>

    <label>
        <input type='radio' name='eleccion' value='Producto'> Producto
    </label>
    <br>

    <label>
        <input type='radio' name='eleccion' value='Venta'> Venta
    </label>
    <br>
    <br>
    <input type='submit' name='$value' value='Aceptar'>
</form>";
}

function insertForm()
{

    if ($_POST['eleccion'] === "Comercial") {
        echo "<h2>AÑADE SU COMERCIAL</h2>
        <form method='post' action='index.php'>

        <label for='nombre'>Nombre:</label>
        <input type='text' name='nombre' id='nombre'>
        <br>
        <br>
        <label for='salario'>Salario:</label>
        <input type='text' name='salario' id='salario'>
        <br>
        <br>
        <label for='hijos'>Número de Hijos:</label>
        <input type='number' name='hijos' id='hijos'>
        <br>
        <br>
        <label for='fNacimiento'>Fecha de Nacimiento:</label>
        <input type='text' name='fNacimiento' id='fNacimiento'>
        <br>
        <br>
        <input type='submit' name='datosNuevos' value='AÑADIR'>
    </form>";
    } elseif ($_POST["eleccion"] === "Producto") {

        echo "<h2>AÑADE SU PRODUCTO</h2>
        <form method='post' action='index.php'>
        <label for='nombre'>Nombre:</label>
        <input type='text' name='nombre' id='nombre'>
        <br>
        <br>
        <label for='descripcion'>Descripcion:</label>
        <input type='text' name='descripcion' id='descripcion'>
        <br>
        <br>
        <label for='precio'>Precio:</label>
        <input type='text' name='precio' id='precio'>
        <br>
        <br>
        <label for='descuento'>Descuento:</label>
        <input type='text' name='descuento' id='descuento'>
        <br>
        <br>
        <input type='submit' name='datosNuevos' value='AÑADIR'>
        </form>";
    } elseif ($_POST["eleccion"] === "Venta") {
        echo "<h2>AÑADE LA VENTA DE UN PRODUCTO</h2>
        <form method='post' action='index.php'>
        <label for='nombreComercial'>Selecciona un comercial:</label>
        <select name='nombreComercial' id='nombreComercial'>";

        $conexion = connectDB();
        $sql = "SELECT nombre FROM comerciales";
        $result = $conexion->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
        }

        $conexion = null;

        echo "</select>
        <br>
        <br>

        <label for='nombreProducto'>Selecciona un producto:</label>
        <select name='nombreProducto' id='nombreProducto'>";

        $conexion = connectDB();
        $sql = "SELECT nombre,descripcion FROM productos";
        $result = $conexion->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['nombre'] . "-" . $row['descripcion'] . "'>" . $row['nombre'] . "-" . $row['descripcion'] . "</option>";
        }

        $conexion = null;

        echo "</select>
        <br>
        <br>
        <label for='cantidad'>Cantidad:</label>
        <input type='text' name='cantidad' id='cantidad'>
        <br>
        <br>
        <label for='fecha'>Fecha:</label>
        <input type='text' name='fecha' id='fecha'>
        <br>
        <br>
        <input type='submit' name='datosNuevos' value='AÑADIR'>
        </form>";
    }
}

// Function to display all tables with all the data
function consultAll()
{

    $conexion = connectDB();

    // FIRST TABLE - COMERCIALES
    {
        $sql = "SELECT * FROM comerciales";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            // Show table for comerciales
            echo "<table border='1'><caption>COMERCIALES</caption>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Salario</th>
                    <th>Hijos</th>
                    <th>F.Nacimiento</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["codigo"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["salario"] . "</td>";
                echo "<td>" . $row["hijos"] . "</td>";
                echo "<td>" . $row["fNacimiento"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron comerciales";
        }
    }
    echo "<br>";
    // SECOND TABLE - PRODUCTS
    {

        $sql = "SELECT * FROM productos";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            // Show table for products
            echo "<table border='1'><caption>PRODUCTOS</caption>
                <tr>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["referencia"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td>" . $row["precio"] . "€</td>";
                echo "<td>" . $row["descuento"] . "%</td>";
                echo "</tr>";
            }
            echo "</table>"; 
        } else {
            echo "No se encontraron productos";
        }
    
    }
    {
        echo "<br>";
        // THIRD TABLE - SALES
        {
            $sql = "SELECT * FROM ventas";
            $result = $conexion->query($sql);

            if ($result->rowCount() > 0) {
                // Show table for sales
                echo "<table border='1'><caption>VENTAS</caption>
                    <tr>
                        <th>codComercial</th>
                        <th>Referencia</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>";

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["codComercial"] . "</td>";
                    echo "<td>" . $row["refProducto"] . "</td>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No se encontraron ventas";
            }
        }
        $conexion = null;
    }
}
// Function to collect the data and to insert it on tables
function insertData()
{
   // Insert the data
    if (isset($_POST["hijos"])) {

        $nuevoNombre = $_POST['nombre'];
        $nuevoSalario = $_POST['salario'];
        $nuevoHijos = $_POST['hijos'];
        $nuevofNacimiento = $_POST['fNacimiento'];

        $conexion = connectDB();
        $codigo = 0;

        // Assign a new code, starting from 0.
        for ($i = 0; $i < 10000; $i++) {
            $sql = "SELECT codigo FROM comerciales WHERE codigo=$i";
            $result = $conexion->query($sql);

            $tamano = $result->rowCount();

            if ($tamano === 0) {
                $codigo = $i;
                break;
            }
        }

       // Check the data
        $validacionComerciales = filterComercial($nuevoNombre, $nuevoSalario, $nuevoHijos, $nuevofNacimiento);

        if ($validacionComerciales === true) {

            // Insert the data using a query
            $sql = "INSERT INTO comerciales (codigo, nombre, salario, hijos, fNacimiento) VALUES (:code, :nombre, :salario, :hijos, :fNacimiento)";

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(":nombre", $nuevoNombre);
            $stmt->bindParam(":salario", $nuevoSalario);
            $stmt->bindParam(":hijos", $nuevoHijos);
            $stmt->bindParam(":fNacimiento", $nuevofNacimiento);
            $stmt->bindParam(":code", $codigo);

            if ($stmt->execute()) {
                echo "<br><p>Tu comercial se introdujo con éxito.</p>";
            } else {
                echo "<br><p>Hubo un error al insertar el comercial.</p>";
            }
        }

        // Same structure as the previous code
    } elseif (isset($_POST["precio"])) {

        $nuevoNombre = $_POST['nombre'];
        $nuevoDescripcion = $_POST['descripcion'];
        $nuevoPrecio = $_POST['precio'];
        $nuevofDescuento = $_POST['descuento'];

        $conexion = connectDB();

        $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referencia = '';

        $existRefe = true;

        while ($existRefe) {
            for ($i = 0; $i < 2; $i++) {
                $referencia .= $letras[rand(0, strlen($letras) - 1)];
            }

            $referencia .= str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $sql = "SELECT referencia FROM productos WHERE referencia='$referencia'";
            $result = $conexion->query($sql);

            $tamano = $result->rowCount();

            if ($tamano === 0) {
                $existRefe = false;
            }
        }

        $validacionProductos = filterProduct($nuevoNombre, $nuevoDescripcion, $nuevoPrecio, $nuevofDescuento);

        if ($validacionProductos === true) {

            $sql = "INSERT INTO productos (referencia, nombre, descripcion, precio, descuento) VALUES (:referencia, :nombre, :descripcion, :precio, :descuento)";

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(":nombre", $nuevoNombre);
            $stmt->bindParam(":descripcion", $nuevoDescripcion);
            $stmt->bindParam(":precio", $nuevoPrecio);
            $stmt->bindParam(":descuento", $nuevofDescuento);
            $stmt->bindParam(":referencia", $referencia);

            if ($stmt->execute()) {
                echo "<br><p>Tu producto se introdujo con éxito.</p>";
            } else {
                echo "<br><p>Hubo un error al insertar el producto.</p>";
            }
        }
        // Same structure as the previous code
    } elseif (isset($_POST["cantidad"])) {

        $nuevoCantidad = $_POST['cantidad'];
        $nuevoFecha = $_POST['fecha'];

        // I save the values in an array
        $conexion = connectDB();
        $nombre = $_POST['nombreComercial'];
        $nom_refe = $_POST['nombreProducto'];
        $nom_refe_array = explode("-", $nom_refe);

        $nombreProducto = $nom_refe_array[0];
        $descripcionProducto = $nom_refe_array[1];

        $sql = "SELECT codigo FROM comerciales WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $codComercial = $stmt->fetch(PDO::FETCH_ASSOC)['codigo'];

        $sql = "SELECT referencia FROM productos WHERE nombre = :nombreProducto AND descripcion = :descripcionProducto";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombreProducto', $nombreProducto);
        $stmt->bindParam(':descripcionProducto', $descripcionProducto);
        $stmt->execute();
        $refProducto = $stmt->fetch(PDO::FETCH_ASSOC)['referencia'];

        $validacionVentas = filterSales($nuevoCantidad, $nuevoFecha);

        if ($validacionVentas === true) {

            $sql = "INSERT INTO ventas (codComercial, refProducto, cantidad, fecha) VALUES (:codComercial, :refProducto, :cantidad, :fecha)";

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(":cantidad", $nuevoCantidad);
            $stmt->bindParam(":fecha", $nuevoFecha);
            $stmt->bindParam(":codComercial", $codComercial);
            $stmt->bindParam(":refProducto", $refProducto);

            if ($stmt->execute()) {
                echo "<br><p>Tu venta se introdujo con éxito.</p>";
            } else {
                echo "<br><p>Hubo un error al insertar la venta.</p>";
            }
        }
    }
}
// Function responsible for collecting the data and replacing it with the previous ones
function modifyData()
{
    $conexion = connectDB();
    // Same structure as Insert, but the function here is UPDATE
    if (isset($_POST["salario"])) {
        $nuevoNombre = $_POST['nombre'];
        $nuevoSalario = $_POST['salario'];
        $nuevoHijos = $_POST['hijos'];
        $nuevofNacimiento = $_POST['fNacimiento'];
        $code = $_POST['code3'];

        $validacionComerciales = filterComercial($nuevoNombre, $nuevoSalario, $nuevoHijos, $nuevofNacimiento);

        if ($validacionComerciales === true) {
            $sql = "UPDATE comerciales SET nombre = :nombre, salario = :salario, hijos = :hijos, fNacimiento = :fNacimiento WHERE codigo = :code";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":nombre", $nuevoNombre);
            $stmt->bindParam(":salario", $nuevoSalario);
            $stmt->bindParam(":hijos", $nuevoHijos);
            $stmt->bindParam(":fNacimiento", $nuevofNacimiento);
            $stmt->bindParam(":code", $code);

            if ($stmt->execute()) {
                echo "<br><p>Los cambios se han guardado correctamente.</p>";
            } else {
                echo "Hubo un error al guardar los cambios.";
            }
        }


    } elseif (isset($_POST["descripcion"])) {

        $nuevoNombre = $_POST['nombre'];
        $nuevoDescripcion = $_POST['descripcion'];
        $nuevoPrecio = $_POST['precio'];
        $nuevofDescuento = $_POST['descuento'];
        $referencia = $_POST['referencia'];

        $validacionProductos = filterProduct($nuevoNombre, $nuevoDescripcion, $nuevoPrecio, $nuevofDescuento);

        if ($validacionProductos === true) {
            $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, descuento = :descuento WHERE referencia = :referencia";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":nombre", $nuevoNombre);
            $stmt->bindParam(":descripcion", $nuevoDescripcion);
            $stmt->bindParam(":precio", $nuevoPrecio);
            $stmt->bindParam(":descuento", $nuevofDescuento);
            $stmt->bindParam(":referencia", $referencia);

            if ($stmt->execute()) {
                echo "<br><p>Los cambios se han guardado correctamente.</p>";
            } else {
                echo "Hubo un error al guardar los cambios.";
            }
        }


    } elseif (isset($_POST["cantidad"])) {

        $nuevoCantidad = $_POST['cantidad'];
        $nuevoFecha = $_POST['fecha'];

        $validacionProductos = filterSales($nuevoCantidad, $nuevoFecha);

        if ($validacionProductos === true) {
            $sql = "UPDATE ventas SET cantidad = :cantidad, fecha = :fecha WHERE refProducto = :referencia";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":cantidad", $nuevoCantidad);
            $stmt->bindParam(":fecha", $nuevoFecha);

            if ($stmt->execute()) {
                echo "<br><p>Los cambios se han guardado correctamente.</p>";
            } else {
                echo "Hubo un error al guardar los cambios.";
            }
        }
    }
}
// Function to consult specific data
function consultData()
{
    $code = (int) ($_POST["code"]);
    $conexion = connectDB();

   // FIRST TABLE - COMMERCIALS 
    {
        $sql = "SELECT * FROM comerciales WHERE codigo = $code";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            echo "<table border='1'><caption>COMERCIALES</caption>
                <tr>
                    <th>Nombre</th>
                    <th>Salario</th>
                    <th>Hijos</th>
                    <th>F.Nacimiento</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["salario"] . "</td>";
                echo "<td>" . $row["hijos"] . "</td>";
                echo "<td>" . $row["fNacimiento"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No se encontraron comerciales</p >";
        }
    }
    // SECOND TABLE - PRODUCTS
    {
        $ref = ($conexion->query("SELECT refProducto FROM ventas WHERE codComercial = $code"));
        $arrayRefe = array();

        // Read the array and add values ​​that do not exist
        while ($row = $ref->fetch(PDO::FETCH_ASSOC)) {
            $refProducto = $row['refProducto'];
            if (!in_array($refProducto, $arrayRefe)) {
                $arrayRefe[] = $refProducto;
            }
        }
        $tablaGenerada = false;
        foreach ($arrayRefe as $value) {

            $sql = "SELECT * FROM productos WHERE referencia = '$value'";
            $result = $conexion->query($sql);

            if ($result->rowCount() > 0) {

                if (!$tablaGenerada) {
                    echo "<table border='1'><caption>PRODUCTOS</caption>
                <tr>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                </tr>";

                    $tablaGenerada = true;
                }

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["referencia"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["precio"] . "€</td>";
                    echo "<td>" . $row["descuento"] . "%</td>";
                    echo "</tr>";
                }
                echo "</table>";

            } 
        }

        if (!$tablaGenerada) {
            echo "<p>No se encontraron productos</p>";
        } else {
            echo "</table>";
        }

    } {

        // THIRD TABLE - SALES
        {
            $sql = "SELECT * FROM ventas WHERE codComercial = $code";
            $result = $conexion->query($sql);

            if ($result->rowCount() > 0) {
                echo "<table border='1'><caption>VENTAS</caption>
                    <tr>
                        <th>Referencia</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>";

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["refProducto"] . "</td>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No se encontraron ventas</p>";
            }
        }
        $conexion = null;
    }
}
// Function that show data in a table with a modify button in each row
function showModifyData()
{
    $code = (int) ($_POST["code2"]);
    $conexion = connectDB();

    // FIRST TABLE - COMMERCIALS 
    {
        $sql = "SELECT * FROM comerciales WHERE codigo = $code";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            echo "<table border='1'><caption>COMERCIALES</caption>
                <tr>
                    <th>Nombre</th>
                    <th>Salario</th>
                    <th>Hijos</th>
                    <th>F.Nacimiento</th>
                </tr>";

            echo "<form method='post' action='index.php'>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<input type='hidden' name='code' value='" . $code . "'>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<input type='hidden' name='nombre' value='" . $row['nombre'] . "'>";
                echo "<td>" . $row["salario"] . "</td>";
                echo "<input type='hidden' name='salario' value='" . $row['salario'] . "'>";
                echo "<td>" . $row["hijos"] . "</td>";
                echo "<input type='hidden' name='hijos' value='" . $row['hijos'] . "'>";
                echo "<td>" . $row["fNacimiento"] . "</td>";
                echo "<input type='hidden' name='fNacimiento' value='" . $row['fNacimiento'] . "'>";
                echo "<td><input type='submit' name='datostabla' value='EDITAR'></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
        } else {
            echo "No se encontraron comerciales";
        }
    }
    // SECOND TABLE - PRODUCTS
    {
        $ref = ($conexion->query("SELECT refProducto FROM ventas WHERE codComercial = $code"));
        $arrayRefe = array();

        
        // Read the array and add values ​​that do not exist
        while ($row = $ref->fetch(PDO::FETCH_ASSOC)) {
            $refProducto = $row['refProducto'];
            if (!in_array($refProducto, $arrayRefe)) {
                $arrayRefe[] = $refProducto;
            }
        }
        $tablaGenerada = false;
        foreach ($arrayRefe as $value) {

            $sql = "SELECT * FROM productos WHERE referencia = '$value'";
            $result = $conexion->query($sql);

            if ($result->rowCount() > 0) {


                if (!$tablaGenerada) {
                    echo "<table border='1'><caption>PRODUCTOS</caption>
                <tr>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                </tr>"
                ;

                    $tablaGenerada = true;
                }
                echo "<form method='post' action='index.php'>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<input type='hidden' name='code' value='" . $code . "'>";
                    echo "<td>" . $row["referencia"] . "</td>";
                    echo "<input type='hidden' name='referencia' value='" . $row['referencia'] . "'>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<input type='hidden' name='nombre' value='" . $row['nombre'] . "'>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<input type='hidden' name='descripcion' value='" . $row['descripcion'] . "'>";
                    echo "<td>" . $row["precio"] . "€</td>";
                    echo "<input type='hidden' name='precio' value='" . $row['precio'] . "'>";
                    echo "<td>" . $row["descuento"] . "%</td>";
                    echo "<input type='hidden' name='descuento' value='" . $row['descuento'] . "'>";
                    echo "<td><input type='submit' name='datostabla' value='EDITAR'></td>";
                    echo "</tr>";
                }

                echo "</form>";
            }
        }

        if (!$tablaGenerada) {
            echo "<p>No se encontraron productos</p>";
        } else {
            echo "</table>";
        }

    } {
        // THIRD TABLE - SALES
        {
            $sql = "SELECT * FROM ventas WHERE codComercial = $code";
            $result = $conexion->query($sql);

            if ($result->rowCount() > 0) {
                echo "<table border='1'><caption>VENTAS</caption>
                    <tr>
                        <th>Referencia</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>";
                echo "<form method='post' action='index.php'>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<input type='hidden' name='code' value='" . $code . "'>";
                    echo "<td>" . $row["refProducto"] . "</td>";
                    echo "<input type='hidden' name='refProducto' value='" . $row['refProducto'] . "'>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<input type='hidden' name='cantidad' value='" . $row['cantidad'] . "'>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<input type='hidden' name='fecha' value='" . $row['fecha'] . "'>";
                    echo "<td><input type='submit' name='datostabla' value='EDITAR'></td>";
                    echo "</tr>";
                }
                echo "</form>";
                echo "</table>";
            } else {
                echo "<p>No se encontraron ventas</p>";
            }
        }
        $conexion = null;
    }
}
// Function that show data in a table with a delete button in each row
function showDeleteData()
{
    $conexion = connectDB();
    if ($_POST['eleccion'] === "Comercial") {

        
        // FIRST TABLE - COMMERCIALS

        $sql = "SELECT * FROM comerciales";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            echo "<table border='1'><caption>COMERCIALES</caption>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Salario</th>
                    <th>Hijos</th>
                    <th>F.Nacimiento</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<form method='post' action='index.php'>";
                echo "<input type='hidden' name='codebo' value='" . $row['codigo'] . "'>";
                echo "<td>" . $row["codigo"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["salario"] . "</td>";
                echo "<td>" . $row["hijos"] . "</td>";
                echo "<td>" . $row["fNacimiento"] . "</td>";
                echo "<td><input type='submit' name='datostablaBoComercial' value='BORRAR'></td>";
                echo "</form>";
                echo "</tr>";
            }
            echo "</table>";

        } else {
            echo "No se encontraron comerciales";
        }

    } elseif ($_POST["eleccion"] === "Producto") {

        // SECOND TABLE - PRODUCTS

        $sql = "SELECT * FROM productos";
        $result = $conexion->query($sql);


        if ($result->rowCount() > 0) {

            echo "<table border='1'><caption>PRODUCTOS</caption>
                <tr>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<form method='post' action='index.php'>";
                echo "<td>" . $row["referencia"] . "</td>";
                echo "<input type='hidden' name='referenciabo' value='" . $row['referencia'] . "'>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td>" . $row["precio"] . "€</td>";
                echo "<td>" . $row["descuento"] . "%</td>";
                echo "<td><input type='submit' name='datostablaBoProducto' value='BORRAR'></td>";
                echo "</form>";
                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "No se encontraron productos";
        }

    } elseif ($_POST["eleccion"] === "Venta") {

        // THIRD TABLE - SALES

        $sql = "SELECT * FROM ventas";
        $result = $conexion->query($sql);

        if ($result->rowCount() > 0) {
            echo "<table border='1'><caption>VENTAS</caption>
                    <tr><th>Código</th>
                        <th>Referencia</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>";
            
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<form method='post' action='index.php'>";
                echo "<input type='hidden' name='referenciabo' value='" . $row['refProducto'] . "'>";
                echo "<input type='hidden' name='codigobo' value='" . $row['codComercial'] . "'>";
                echo "<td>" . $row["codComercial"] . "</td>";
                echo "<td>" . $row["refProducto"] . "</td>";
                echo "<td>" . $row["cantidad"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<input type='hidden' name='fechabo' value='" . $row['fecha'] . "'>";
                echo "<td><input type='submit' name='datostablaBoVenta' value='BORRAR'></td>";
                echo "</form>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron ventas";
        }

        $conexion = null;
    }
}
// Function that deletes data from the respective row corresponding to the pressed button
function deleteData()
{

    $conexion = connectDB();
    
    //Simply collects the key data from the selected row and inserts them into a DELETE query.
    if (isset($_POST["datostablaBoComercial"])) {

        $codigo = $_POST["codebo"];
        var_dump($codigo);
        $sql = "DELETE FROM ventas WHERE codComercial = :codigo";
        $sql2 = "DELETE FROM comerciales WHERE codigo = :codigo";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(":codigo", $codigo);

        if ($stmt->execute()) {

            $stmt2 = $conexion->prepare($sql2);
            $stmt2->bindParam(":codigo", $codigo);

            if ($stmt2->execute()) {
                var_dump($codigo);
                echo "<br><p>Se ha eliminado correctamente el comercial y sus respectivas ventas.</p>";
            } else {
                echo "Hubo un error al borrar el comercial.";
            }

        } else {
            echo "Hubo un error al borrar.";
        }

    }elseif (isset($_POST["datostablaBoProducto"])){

        $referencia = $_POST["referenciabo"];

        $sql = "DELETE FROM ventas WHERE refProducto = :referencia";
        $sql2 = "DELETE FROM productos WHERE referencia = :referencia";     

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(":referencia", $referencia);

        if ($stmt->execute()) {

            $stmt2 = $conexion->prepare($sql2);
            $stmt2->bindParam(":referencia", $referencia);

            if ($stmt2->execute()) {
                echo "<br><p>Se ha eliminado correctamente el producto y sus respectivas ventas.</p>";
            } else {
                echo "Hubo un error al borrar el producto.";
            }

        } else {
            echo "Hubo un error al borrar.";
        }
    }elseif (isset($_POST["datostablaBoVenta"])){

        $referencia = $_POST["referenciabo"];
        $codigo = $_POST["codigobo"];
        $fecha = $_POST["fechabo"];

        $sql = "DELETE FROM ventas WHERE refProducto = :referencia AND codComercial = :codigo AND fecha = :fecha";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(":referencia", $referencia);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->bindParam(":fecha", $fecha);

        if ($stmt->execute()) {

            echo "<br><p>Se ha eliminado correctamente la venta del producto.</p>";

        } else {
            echo "Hubo un error al borrar la venta.";
        }
    }
}


//Functions to validate the data
function validarFecha($fecha)
{
    // Regular expression for the date format
    $patron = "/^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/";
    return preg_match($patron, $fecha);
}

function checkPercent($porciento)
{

    if ($porciento > 100 | $porciento < 0) {
        echo "El porcentaje introducido no es válido";
    } else {
        return $porciento;
    }
}

function filterSales($cantidad, $fecha)
{

    $valido = true;

    if (!is_numeric($cantidad) || $cantidad < 0) {
        $valido = false;
        echo "<br>Esa cantidad no es válida.";
    }
    if (!validarFecha($fecha)) {
        $valido = false;
        echo "<br>Formato de fecha no válido. El formato es YYYY-MM-DD.";
    }

    return $valido;
}

function filterComercial($nombre, $salario, $hijos, $fNacimiento)
{

    $valido = true;

    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóú\s]+$/', $nombre)) {
        $valido = false;
        echo "<br>Error en el nombre, se introdujeron otros carácteres diferentes a letras.";
    }
    if (!validarFecha($fNacimiento)) {
        $valido = false;
        echo "<br>Formato de fecha no válido. Utiliza YYYY-MM-DD.";
    }
    if (!is_numeric($hijos) || $hijos < 0) {
        $valido = false;
        echo "<br>Ese número de hijos no es válido.";
    }
    if (!is_numeric($salario) || $salario < 0) {
        $valido = false;
        echo "<br>Ese número de salario no es válido.";
    }

    $conexion = connectDB();
    $sql = "SELECT nombre FROM comerciales WHERE nombre != '$nombre'";
    $result = $conexion->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        if ($row['nombre'] === $nombre) {
            $valido = false;
            echo "<br>Otro comercial tiene ese nombre.";
        }
    }

    return $valido;
}

function filterProduct($nombre, $descripcion, $precio, $descuentos)
{

    $valido = true;

    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóú0-9\s]+$/', $nombre) || strlen($nombre) > 20) {
        $valido = false;
        echo "<br>Solo puedes escribir con letras.";
    }
    if (strlen($descripcion) === 0 || strlen($descripcion) > 20) {
        $valido = false;
        echo "<br>La descripcion es demasiado corta o demasiado larga(0 - 20 carácteres).";
    }
    if (!is_numeric($precio) || $precio < 0) {
        $valido = false;
        echo "<br>Ese precio no es válido.";
    }
    if (!is_numeric($descuentos) || $descuentos < 0) {
        $valido = false;
        echo "<br>Ese descuento no es válido.";
    }

    return $valido;
}

