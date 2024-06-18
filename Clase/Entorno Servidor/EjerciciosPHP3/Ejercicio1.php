<!DOCTYPE html>
<html>
<head>
    <title>Language Selection</title>
</head>
<body>
<?php

if (isset($_POST['idioma'])) {
    $idiomaElegido = $_POST['idioma'];
    setcookie('idioma_usuario', $idiomaElegido, time() + 3600 * 24 * 30); // Establece una cookie para 30 dias
} else {
    $idiomaElegido = isset($_COOKIE['idioma_usuario']) ? $_COOKIE['idioma_usuario'] : 'es'; 
}

if ($idiomaElegido === 'en') {
    echo "<h1>Welcome</h1>";
    echo "<p>This is the English version of the page.</p>";
} else {
    echo "<h1>Bienvenido</h1>";
    echo "<p>Esta es la versión en español de la página.</p>";
}
?>

<form method="post">
    <label for="idioma">Choose your language:</label>
    <select id="idioma" name="idioma">
        <option value="en" <?php if ($idiomaElegido === 'en') echo 'selected'; ?>>English</option>
        <option value="es" <?php if ($idiomaElegido === 'es') echo 'Elegido'; ?>>Español</option>
    </select>
    <input type="submit" value="Save">
</form>

</body>
</html>