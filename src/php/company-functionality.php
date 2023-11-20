<?php
    require 'mysql-connection.php';
    require 'company.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        registerCompany();
    }

    // Crear empresas nuevas a traves del formulario y añadirlas a la BBDD
    function registerCompany() {
        $name = $_POST['name'];
        $nif = $_POST['nif'];
        $type = $_POST['type'];
        $address = $_POST['location'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


        // Hacemos el insert de una nueva empresa en la BBDD
        $sentencia = connectDB()->prepare("INSERT INTO COMPANY (LOGO, NIF, NAME, TYPE, COUNTRY, ADDRESS, PHONE, EMAIL) VALUES (:logo, :nif, :nombre, :tipo, :pais, :direccion, :telefono, :email)");


        // Ejecuta la sentencia SQL de inserción
        $exito = $sentencia->execute();

        if ($exito) {
            echo "Empresa insertada exitosamente.";
        } else {
            echo "Hubo un error al in sertar la empresa.";
        }

        // Cierra la conexión a la base de datos
        connectDB()->close();
    }

    function saveLogo() {
        define('MAX_SIZE', 500000);

        $target_dir = "uploads/";  // Directorio donde se subirán las imágenes.
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica si el archivo es una imagen real.
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadOk = 0;
            }
        }

// Verifica si el archivo ya existe.
        if (file_exists($target_file)) {
            echo "Lo siento, la imagen ya existe.";
            $uploadOk = 0;
        }

// Verifica el tamaño del archivo.
        if ($_FILES["fileToUpload"]["size"] > MAX_SIZE) {  // por ejemplo, 500KB
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

// Permite ciertos formatos de archivo.
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Solo se permiten archivos JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

// Verifica si $uploadOk está establecido en 0 por un error.
        if ($uploadOk == 0) {
            echo "Tu archivo no fue subido.";
// Si todo está bien, intenta subir el archivo.
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subida.";
            } else {
                echo "Hubo un error al subir tu archivo.";
            }
        }
    }

    $arrayCompanies = [];

    // Listar todas las empresas que hay en la BBDD en la página de 'companies-list.php'

    function showCompanies() {
        $allCompanies = 'SELECT * FROM COMPANY';
        $result = connectDB()->query($allCompanies);

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


