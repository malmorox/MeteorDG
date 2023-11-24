<?php
    require 'mysql-connection.php';
    require 'company.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        registerCompany();
    }

    // Crear empresas nuevas a traves del formulario y añadirlas a la BBDD
    function registerCompany() {
        $nif = $_POST['nif'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $country = $_POST['country'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $logo = saveLogo();

        $dbconnection = connectDB();
        // Hacemos el insert de una nueva empresa en la BBDD
        $sentencia = $dbconnection->prepare("INSERT INTO COMPANY (LOGO, NIF, NAME, TYPE, COUNTRY, ADDRESS, PHONE, EMAIL) VALUES (:logo, :nif, :name, :type, :country, :address, :$hone, :email)");

        $sentencia->bindParam(':logo', $logo);
        $sentencia->bindParam(':nif', $nif);
        $sentencia->bindParam(':name', $name);
        $sentencia->bindParam(':type', $type);
        $sentencia->bindParam(':country', $country);
        $sentencia->bindParam(':address', $address);
        $sentencia->bindParam(':phone', $phone);
        $sentencia->bindParam(':email', $email);

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
        define('MAX_IMAGE_SIZE', 50000);

        $targetDirectory = "../../resources/companies-logos/";  // Directorio donde se guardan los logos de las empresas
        $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Verifica si el archivo es una imagen real
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

        // Verifica si la imagen ya existe
        if (file_exists($target_file)) {
            echo "Lo siento, la imagen ya existe.";
            $uploadOk = 0;
        }

        // Verifica el tamaño del archivo
        if ($_FILES["fileToUpload"]["size"] > MAX_SIZE) {
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permite ciertas extensiones de archivo
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Solo se permiten archivos JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        // Verifica si $uploadOk está establecido en 0 por un error
        if ($uploadOk == 0) {
            echo "Tu archivo no fue subido.";
        // Si todo está bien, intenta subir el archivo
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
                echo '<a href="company-details.php?nif=' . $company->getNif() . '">';
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
                echo '</a>';
            }
        } else {
            echo '<div class="meteordg-notfound-company">';
            echo '<span> No companies found. </span>';
            echo '</div>';
        }

        $conn->close();
    }

    function getClickedCompanyDetails($nif) {
        $companyData = "SELECT * FROM COMPANY WHERE NIF = '$nif'";
        $result = connectDB()->query($companyData);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    function showCompanyDetails($companyDetails) {
        if ($companyDetails) {
            echo '<div class="meteordg-company-logo">';
            //echo '<img src="../../resources/companies-logos/' . $companyDetails['logo'] . '">';
            echo '<img src="' . $companyDetails['logo'] . '">';
            echo '</div>';
            echo '<div class="meteordg-company-data-zone">';
            echo '<div class="meteordg-company-name">';
            echo '<span>' . $companyDetails['name'] . '</span>';
            echo '</div>';
            echo '<div class="meteordg-company-nif">';
            echo '<span>' . $companyDetails['nif'] . '</span>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<p>Company not found.</p>';
        }
    }

    function getClickedCompanyFlow($nif) {
        $companyFlow = "SELECT * FROM COMPANY_TRANSACTION WHERE NIF_ORIGIN = '$nif'";
        $result = connectDB()->query($companyFlow);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    function showCompanyFlow($companyFlow) {
        foreach ($companyFlow as $row) {
            echo '<tr>';
            echo '<td>' . $row['ID_TRANSACTION'] . '</td>';
            echo '<td>' . $row['NIF_ORIGIN'] . '</td>';
            echo '<td>' . $row['NIF_DESTINATION'] . '</td>';
            echo '<td>' . $row['AMOUNT'] . '</td>';
            echo '<td>' . $row['BADGE'] . '</td>';
            echo '<td>' . date("d/m/Y", strtotime($row['DATE_TRANSACTION'])) . '</td>';
            echo '</tr>';
        }
    }

    function searchCompanies($searchTerm) {
        $searchQuery = "SELECT * FROM COMPANY WHERE NAME LIKE '$searchTerm%'";
        $result = connectDB()->query($searchQuery);

        $filteredCompanies = [];
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
                array_push($filteredCompanies, $company);
            }
        }
        return $filteredCompanies;
    }
?>