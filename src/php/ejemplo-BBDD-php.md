Para acceder a una base de datos MySQL con PHP, necesitas seguir varios pasos. A continuación, te proporciono una guía básica sobre cómo hacerlo:

1. Configura tu entorno:
   Asegúrate de tener un servidor web local o un servidor de alojamiento web que admita PHP y MySQL. También necesitarás tener MySQL instalado y configurado.

2. Conecta a la base de datos:
   Utiliza la función `mysqli_connect` o PDO (PHP Data Objects) para conectarte a la base de datos MySQL. A continuación se muestran ejemplos de ambas opciones:

   Usando mysqli:

   ```php
   $servidor = "localhost";
   $usuario = "tu_usuario";
   $contrasena = "tu_contrasena";
   $base_de_datos = "tu_base_de_datos";

   $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

   if (!$conexion) {
       die("Error de conexión: " . mysqli_connect_error());
   }
   ```

   Usando PDO:

   ```php
   $servidor = "localhost";
   $usuario = "tu_usuario";
   $contrasena = "tu_contrasena";
   $base_de_datos = "tu_base_de_datos";

   try {
       $conexion = new PDO("mysql:host=$servidor;dbname=$base_de_datos", $usuario, $contrasena);
       $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       echo "Error de conexión: " . $e->getMessage();
   }
   ```

3. Ejecuta consultas SQL:
   Ahora que estás conectado a la base de datos, puedes ejecutar consultas SQL para interactuar con ella. Por ejemplo, para realizar una consulta SELECT:

   Usando mysqli:

   ```php
   $sql = "SELECT * FROM nombre_de_tabla";
   $resultado = mysqli_query($conexion, $sql);

   while ($fila = mysqli_fetch_assoc($resultado)) {
       echo "Nombre: " . $fila['nombre'] . "<br>";
   }

   mysqli_close($conexion);
   ```

   Usando PDO:

   ```php
   $sql = "SELECT * FROM nombre_de_tabla";
   $stmt = $conexion->prepare($sql);
   $stmt->execute();

   while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo "Nombre: " . $fila['nombre'] . "<br>";
   }
   ```

4. No olvides manejar errores y cerrar la conexión a la base de datos cuando hayas terminado.

Este es un ejemplo básico de cómo acceder a una base de datos MySQL con PHP. Dependiendo de tus necesidades, deberás adaptar y ampliar este código para realizar otras operaciones, como inserciones, actualizaciones y eliminaciones de datos. También es importante utilizar consultas preparadas para prevenir ataques de inyección SQL y validar y filtrar los datos de entrada adecuadamente.