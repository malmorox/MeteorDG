<?php
function get_image() {
    isset($_POST['image']) {
        $image = $_POST['image'];
        return $image;
    }
}

function get_name() {
    isset($_POST['name']) {
        $company_name = $_POST['name'];
        return $company_name;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nif = $_POST['nif'];
    $email = $_POST['email'];
    $adress = $_POST['location'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    // Establece la conexión a la base de datos (ajusta los valores de conexión según tu configuración)
    $host = "tu_host";
    $usuario = "tu_usuario";
    $contrasena = "tu_contrasena";
    $base_datos = "tu_base_de_datos";

    $conexion = new PDO("pgsql:host=$host;dbname=$base_datos", $usuario, $contrasena);

    // Prepara la sentencia SQL de inserción
    $sentencia = $conexion->prepare("INSERT INTO COMPANY (NIF, NAME, TYPE, COUNTRY) VALUES (:nif, :nombre, :tipo, :pais)");
    $sentencia->bindParam(':nif', $nif, PDO::PARAM_STR);
    $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $sentencia->bindParam(':pais', $pais, PDO::PARAM_STR);

    // Ejecuta la sentencia SQL de inserción
    $exito = $sentencia->execute();

    if ($exito) {
        echo "Empresa insertada exitosamente.";
    } else {
        echo "Hubo un error al insertar la empresa.";
    }

    // Cierra la conexión a la base de datos
    $conexion = null;
}
?>

<?php
$sql = "SELECT * FROM COMPANY";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $company = new Company(
            $row['logo'],
            $row['nif'],
            $row['name'],
            $row['type'],
            $row['country'],
            $row['legalAddress'],
            $row['phone'],
            $row['email']
        );

        //imprimir la información en un contenedor de la empresa en HTML
        echo '<div class="meteordg-company" data-company="' . strtolower($company->getName()) . '">';
        echo '<div class="meteordg-company-info-zone">';
        echo '<div class="meteordg-company-logo" id="' . $company->getName() . '">';
        echo '<img src="../../resources/companies-logos/' . $company->getLogo() . '">';
        echo '</div>';
        echo '<div class="meteordg-company-data-zone">';
        echo '<div class="meteordg-company-name">';
        echo '<span>' . $company->getName() . '</span>';
        echo '</div>';
        echo '<div class="meteordg-company-nif">';
        echo '<span>' . $company->getNif() . '</span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No companies found";
}

$conn->close();
?>


