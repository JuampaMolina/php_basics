<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contaactos</title>
</head>
<body>
    <?php
        session_start(['cookie_lifetime' => 3600]);
        if (!isset($_SESSION['agenda']))
            $_SESSION['agenda'] = array();
        if (isset($_REQUEST['submit'])) {
            $nuevo_nombre = trim($_REQUEST['nombre']);
            $nuevo_telefono = $_REQUEST['telefono'];
            if(empty($nuevo_nombre))
                echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";
            elseif(empty($nuevo_telefono))
                unset($_SESSION['agenda'][$nuevo_nombre]);
            else
                $_SESSION['agenda'][$nuevo_nombre] = $nuevo_telefono;
        }
    ?>

    <h2>Nuevo contacto</h2>
    <form action="" method="get" >
        <!-- Metemos los contactos ya existentes ocultos en el formulario -->
        <div style="align-items: left">
            <label>Nombre:<input type="text" name="nombre"/></label><br />
            <label>Teléfono:<input type="text" name="telefono"/></label><br />
            <input type="submit" name='submit' value="Ejecutar"/><br />
        </div>
    </form>
    <br />

    <h2>Agenda</h2>
        <?php
        $agenda = $_SESSION['agenda'];
        if (count($agenda) == 0)
            echo "<p>No hay contactos en la agenda.</p>";
        else
        {
            echo "<ul>";
            foreach ($agenda as $nombre => $telefono)
                echo "<li>" . $nombre . ': ' . $telefono . "</li>";
            echo "</ul>";
        }
        ?> 
</body>
</html>