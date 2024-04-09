<?php 
  //Se genera la conexión con la base de datos
  $conexion=mysqli_connect("localhost","root","","prueba1");
  //inicia la sesión para poder utilizar los datos de la sesión
  session_start();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,400;8..144,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Marvel:wght@700&family=Roboto+Flex:opsz,wght@8..144,400;8..144,700&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="css/estiloindex.css" rel="stylesheet" type="text/css">
    <title>ED1</title>
  </head>
  <body>
    <div id="wrapper">
      <!--Se crea un encabezado en donde colocamos un icono de logueado y así mismo los
        datos que guardamos del usuario al iniciar sesión y el icono de la empresa con una
        conexión a la página de la upemor-->
      <header class="header">
        <div class="container logo-nav-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="130" height="auto" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg>
          <?php echo "<h4> Bienvenido: " . $_SESSION["rol"];
            echo "<br>Nombre: " . $_SESSION["nombre"];
            echo "<h4>" ;?>
          <h2 >Sistema integral para pacientes de cuidados paliativos</h2>
          <a href="https://www.upemor.edu.mx/" class="logo"><img src="img/upemor.png"></a>
        </div>
      </header>
      <!--Se genera un espacio de para un menú de navegación
        mediante el cual se crean los enlaces a cada página de 
		cada función
        -->
      <nav>
        <br>
        <h2>Menú</h2>
        <ul class="menu">
          <li><a href="gestionE.php">Gestión de Enfermeros (a)</a></li>
          <li><a href="gestionP.php">Gestión de Pacientes</a></li>
          <li><a href="gestionC.php">Gestión de citas</a></li>
          <li><a href="gestionM.php">Gestión de medicamentos</a></li>
          <li><a href="gestionF.php">Gestión de familiares</a></li>
          <li><a href="historialm.php">Generar Historial médico</a></li>
          <li><a href="controlador/cerrarsesion.php">Cerrar Sesión<a></li>
        </ul>
      </nav>
      <main>
        <br>
        <section id="scroll" class="barra">
          <br><br><br>
          <video  width="640px" heigth="auto" controls autoplay>
            <source src="img/estancia.mp4" type="video/mp4">
            <br>	
          </video>
        </section>
      </main>
      <aside>
      </aside>
      <footer>
        <section id="datos">
          <h4>P.º Cuauhnáhuac 566, Lomas del Texcal, 62574 Jiutepec, Mor.</h4>
        </section>
      </footer>
    </div>
  </body>
</html>