<?php
include("../db/db.php");
require '../vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

// Función para limpiar y preparar los datos antes de almacenarlos en la base de datos
function limpiarDatos($datos)
{
    $datosLimpio = [];
    foreach ($datos as $key => $value) {
        $datosLimpio[$key] = htmlspecialchars(trim($value));
    }
    return $datosLimpio;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $datosFormulario = limpiarDatos($_POST);
    $cedula = $datosFormulario['cedula'];
    $nombre = $datosFormulario['nombre'];
    $email = $datosFormulario['email'];

    // Verificar si la cédula ya existe en la base de datos
    $sql_verificar_cedula = "SELECT * FROM personas WHERE cedula = '$cedula'";
    $result_verificar_cedula = mysqli_query($conn, $sql_verificar_cedula);
    if (mysqli_num_rows($result_verificar_cedula) > 0) {
        echo '
        <script>
            alert("El usuario ya se encuentra registrado");
            window.location.href = "../index.php";
        </script>
        ';
        exit; // Termina la ejecución del script después de la redirección
    } else {
        // Genera el código de barras usando la cédula como información
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $barcodeData = $generator->getBarcode($cedula, $generator::TYPE_CODE_128);
        $barcode = md5($barcodeData); // Convertimos el código de barras en una cadena alfanumérica fija

        // Guarda la imagen del código de barras en la carpeta img
        $filename = '../img/barcode_' . time() . '.png';
        file_put_contents($filename, $barcodeData);

        // Guarda los datos en la base de datos
        $sql = "INSERT INTO personas (cedula, nombre, email, imagen, code_bar) VALUES ('$cedula', '$nombre', '$email', '$filename', '$barcode')";
        if (mysqli_query($conn, $sql)) {
            echo "Datos guardados correctamente en la base de datos.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}




// Muestra la información y el código de barras generado con estilos
echo "<div style='text-align: center; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 5px; padding: 20px; width: 50%; margin: 0 auto;'>";
echo "<h2 style='font-family: Arial, sans-serif;'>Información</h2>";
echo "<form method='post'>";
echo "<div style='margin-bottom: 20px;'>";
echo "<p><strong>Cédula:</strong> $cedula</p>";
echo "<p><strong>Nombre:</strong> $nombre</p>";
echo "<p><strong>Correo electrónico:</strong> $email</p>";
echo "</div>";
echo "<h2 style='font-family: Arial, sans-serif;'>Código de barras</h2>";
echo "<img src='$filename' alt='Código de barras' style='display: block; margin: 0 auto;'>";
echo "<p style='color: green;'>Ruta de la imagen: $filename</p>";
echo "</form>";
echo "<a href='../index.php' style='text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px;'>Volver</a>";
echo "</div>";
