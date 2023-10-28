<?php
// Establece la conexión a la base de datos (ajusta los valores de conexión según tu configuración)
$host = "tu_host";
$usuario = "tu_usuario";
$contrasena = "tu_contrasena";
$base_datos = "tu_base_de_datos";

$conexion = new PDO("pgsql:host=$host;dbname=$base_datos", $usuario, $contrasena);

// Llama al procedimiento almacenado
$nif = "A28713642";
$nombre = "BMW";
$tipo = "GERMANY";
$pais = "MUNICH";

$stmt = $conexion->prepare("SELECT * FROM buscar_empresas(:nif, :nombre, :tipo, :pais)");
$stmt->bindParam(':nif', $nif, PDO::PARAM_STR);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
$stmt->bindParam(':pais', $pais, PDO::PARAM_STR);

$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cierra la conexión a la base de datos
$conexion = null;

// Imprime los resultados
foreach ($resultados as $empresa) {
    echo "NIF: " . $empresa['nif'] . "<br>";
    echo "Nombre: " . $empresa['name'] . "<br>";
    echo "Tipo: " . $empresa['type'] . "<br>";
    echo "País: " . $empresa['country'] . "<br>";
    echo "Dirección: " . $empresa['address'] . "<br>";
    echo "Teléfono: " . $empresa['phone'] . "<br>";
    echo "Correo electrónico: " . $empresa['email'] . "<br><br>";
}
?>

<?php
$mysqli = new mysqli("localhost", "usuario", "contraseña", "basededatos");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

// Realizar una consulta para obtener las empresas
$result = $mysqli->query("SELECT * FROM COMPANY");

$companies = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companies[] = $row;
    }
} else {
    $companies[] = "No hay empresas en la base de datos";
}

// Devolver la respuesta en formato JSON
echo json_encode($companies);

// Cerrar la conexión
$mysqli->close();
?>

