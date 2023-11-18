<?php
    require 'mysql-connection.php';
    require 'company.php';

    // Crear empresas nuevas a traves del formulario y añadirlas a la BDD

$name = $conn->real_escape_string($_POST['name']);
$NIF = $conn->real_escape_string($_POST['nif']);
$email = $conn->real_escape_string($_POST['email']);
$adress = $conn->real_escape_string($_POST['location']);
$country = $conn->real_escape_string($_POST['country']);
$phone = $conn->real_escape_string($_POST['phone']);

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $NIF, $name, $country, $adress, $phone, $email);

if ($stmt->execute()) {
    echo "Datos insertados con éxito.";
} else {
    echo "Error: " . $stmt->error;
}


function registerCompany() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $nif = $_POST['nif'];
            $email = $_POST['email'];
            $adress = $_POST['location'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];


            // Hacemos el insert de una nueva empresa en la BBDD
            $sentencia = $conexion->prepare("INSERT INTO COMPANY (LOGO, NIF, NAME, TYPE, COUNTRY, ADDRESS, PHONE, EMAIL) VALUES (:logo, :nif, :nombre, :tipo, :pais, :direccion, :telefono, :email)");


            // Ejecuta la sentencia SQL de inserción
            $exito = $sentencia->execute();

            if ($exito) {
                echo "Empresa insertada exitosamente.";
            } else {
                echo "Hubo un error al insertar la empresa.";
            }

            // Cierra la conexión a la base de datos
            $conn->close();
        }

        showCompanies();
    }

    $arrayCompanies = [];

    // Listar todas las empresas que hay en la BBDD en la página de 'companies-list.php'

    function showCompanies() {
        $allCompanies = 'SELECT * FROM COMPANY';
        $result = $conn->query($allCompanies);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $company = new Company(
                    $row['logo'],
                    $row['nif'],
                    $row['name'],
                    $row['type'],
                    $row['country'],
                    $row['address'],
                    $row['phone'],
                    $row['email']
                );

                array_push($arrayCompanies, $company);

                // Imprimir la empresa en un contenedor dentro del HTML
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
            echo '<div class="meteordg-notfound-company">';
            echo '<span> No companies found. </span>';
            echo '</div>';
        }

        $conn->close();
    }
?>


