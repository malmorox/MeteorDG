<?php
    include_once 'DBConnect.php';
    require 'Company.php';

    const GET_ALL_FROM_COMPANIES = 'SELECT * FROM COMPANY';

    // Instancia global de la clase DBConnect (la llamaremos en las funciones)
    $db = DBConnect::getInstance();

    $errorList = [];

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

        // Obtenemos la instancia global de DBConnect
        if (validateInsertion($nif, $name, $type, $country, $address, $phone, $email)) {
            global $db ;
            $conn = $db->getConnection();

            // Hacemos el insert de una nueva empresa en la BBDD
            $query = $conn->prepare("INSERT INTO COMPANY (LOGO, NIF, COMPANY_NAME, COMPANY_TYPE, COUNTRY, COMPANY_ADDRESS, PHONE, COMPANY_EMAIL) VALUES (:logo, :nif, :name, :type, :country, :address, :phone, :email)");

            $query->bindParam(':logo', $logo);
            $query->bindParam(':nif', $nif);
            $query->bindParam(':name', $name);
            $query->bindParam(':type', $type);
            $query->bindParam(':country', $country);
            $query->bindParam(':address', $address);
            $query->bindParam(':phone', $phone);
            $query->bindParam(':email', $email);

            // Ejecutamos la query de inserción
            $success = $query->execute();

            if ($success) {
                echo "Empresa insertada exitosamente.";
            } else {
                echo "Hubo un error al insertar la empresa.";
            }

            // Cierro la conexion a la BBDD
            $db->closeConnection();
        }
    }

    function validateInsertion($nif, $name, $type, $country, $address, $phone, $email) {
        // Validamos que el telefono cumple con el regex
        if (!preg_match('/^[0-9]{9}$/', $phone)) {
            $errorList['company-phone'] = "*El número de telefono no es valido";
            return false;
        }
        // Validamos que el formato del correo es correcto
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorList['company-email'] = "";
            return false;
        }

        if (empty($name) || empty($nif)) {
            $errorList['company-name'] = "";
            return false;
        }

        return true;
    }

    // Función para guardar el logo en resources y rotornar la ruta del logo que vamos a meter en la BBDD
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
        if (file_exists($targetFile)) {
            echo "Lo siento, la imagen ya existe.";
            $uploadOk = 0;
        }

        // Verifica el tamaño del archivo
        if ($_FILES["fileToUpload"]["size"] > MAX_IMAGE_SIZE) {
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subida.";
                return $targetFile;
            } else {
                echo "Hubo un error al subir tu archivo.";
            }
        }
    }

    $arrayCompanies = [];

    // Listar todas las empresas que hay en la BBDD en la página de 'companies-list.php'

    function showCompanies() {
        $allCompanies = GET_ALL_FROM_COMPANIES;
        global $db;
        $result = $db->getConnection()->query($allCompanies);

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

        $db->closeConnection();
    }

    function getClickedCompanyDetails($nif) {
        global $db;
        $conn = $db->getConnection();

        $companyData = "SELECT * FROM COMPANY WHERE NIF = :nif";
        $stmt = $conn->prepare($companyData);
        $stmt->bindParam(':nif', $nif);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            return $result;
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
        global $db;
        $conn = $db->getConnection();

        $companyFlow = "SELECT * FROM TRANSACTIONS WHERE NIF_ORIGIN = :nif OR NIF_DESTINATION = :nif ORDER BY TRANSACTION_DATE DESC";
        $stmt = $conn->prepare($companyFlow);
        $stmt->bindParam(':nif', $nif);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result !== false) {
            return $result;
        }
        return null;
    }

    function showCompanyFlow($companyFlow) {
        foreach ($companyFlow as $row) {
            echo '<tr>';
            echo '<td>' . $row['TRANSACTION_ID'] . '</td>';
            echo '<td>' . $row['NIF_ORIGIN'] . '</td>';
            echo '<td>' . $row['NIF_DESTINATION'] . '</td>';
            echo '<td>' . $row['AMOUNT'] . '</td>';
            echo '<td>' . $row['BADGE'] . '</td>';
            echo '<td>' . date("d/m/Y", strtotime($row['TRANSACTION_DATE'])) . '</td>';
            echo '</tr>';
        }
    }

    function searchCompanies($searchTerm) {
        global $db;
        $conn = $db->getConnection();

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

    //tipos de empresas para el formulario de registro
    const COMPANY_TYPES = [
        'Venta al por menor o al por mayor', 'Alimentación/Gastronomía', 'Tecnología/Telecomunicaciones', 'Videojuegos',
        'Cuidado personal/Estética', 'Salud', 'Arquitectura/Construcción', 'Comercio electrónico', 'Educación',
        'Servicios especializados', 'Servicios contables o financieros', 'Consultoría', 'Vehículos y recambios',
        'Agricultura/Ganadería', 'Manufactura', 'Artes/Manualidades', 'Transporte/Logística', 'Publicidad/Medios digitales',
        'Hostelería/Turismo', 'Entretenimiento', 'ONG', 'Otros'
    ];
?>