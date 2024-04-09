<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href='nav.css' rel='stylesheet' type='text/css'>
    <link href='formulario.css' rel='stylesheet' type='text/css'>
</head>
<body>
  
<div class="page">
  <div class="pageHeader">
    <div class="title">Sistema web identificación de estilos de aprendizaje</div>
    <div class="userPanel"><span class="username"><i class="fa-solid fa-user-large"></i>John Doe</span></div>
  </div>
  <div class="main">
    <div class="nav">
      
      <div class="menu">
        <div class="title">Menu</div>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
          </svg>  Inicio</li>

          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
          </svg>  Nuevo usuario</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"/>
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg>  Baja</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
          </svg>  Asignar Material</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
          </svg>  Ver usuarios</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-export" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
            <path d="M4 6v6c0 1.657 3.582 3 8 3c1.118 0 2.183 -.086 3.15 -.241" />
            <path d="M20 12v-6" />
            <path d="M4 12v6c0 1.657 3.582 3 8 3c.157 0 .312 -.002 .466 -.005" />
            <path d="M16 19h6" />
            <path d="M19 16l3 3l-3 3" />
          </svg>  Respaldo</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-cog" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
            <path d="M4 6v6c0 1.657 3.582 3 8 3c.21 0 .42 -.003 .626 -.01" />
            <path d="M20 11.5v-5.5" />
            <path d="M4 12v6c0 1.657 3.582 3 8 3" />
            <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M19.001 15.5v1.5" />
            <path d="M19.001 21v1.5" />
            <path d="M22.032 17.25l-1.299 .75" />
            <path d="M17.27 20l-1.3 .75" />
            <path d="M15.97 17.25l1.3 .75" />
            <path d="M20.733 20l1.3 .75" />
          </svg>   Restauracion DB</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>  Logout</li>
        </ul>
      </div>
    </div>
    <div class="view">
      <!--img src="vistaA.jpeg"-->
      <div class="container-fluid row">
        <!--El formulario envía datos por medio del method post -->
        <form  class=" col-10 p-3 formulario" method="POST" >
          <h3>Registro de Administradores</h3>
          <!--Se genera la llamada a la función registroA.php la cual genera el registro de Administradores por medio
            del botón registrar del formulario. 
            Así como a la función conexion.php la cual contiene el código para la conexión a la base de datos
            -->
        
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Nombre del Administrador</label>
            <!--Genera el espacio para introducir el nombre del administrador y envía el dato nombre
              por medio del method post del formulario
              -->
            <input type="text" class="form-control" name="nombre" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Apellido paterno del Administrador</label>
            <!--Genera el espacio para introducir el apellido paterno del administrador y envía 
              el dato apellidoP por medio del method post del formulario -->
            <input type="text" class="form-control" name="apellidoP" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Apellido materno del Administrador</label>
            <!--Genera el espacio para introducir el apellido materno del administrador y envía 
              el dato apellidoM por medio del method post del formulario -->
            <input type="text" class="form-control" name="apellidoM" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Fecha de nacimiento</label>
            <!--Genera el espacio para introducir la fecha de nacimiento del administrador y envía 
              el dato fechan por medio del method post del formulario -->
            <input type="date" class="form-control" name="fechan" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Cedula</label>
            <!--Genera el espacio para introducir la Cedula del administrador y envía 
              el dato cedula por medio del method post del formulario -->
            <input type="text" class="form-control" name="cedula" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Contraseña</label>
            <!--Genera el espacio para introducir la contraseña del administrador y envía 
              el dato contraseña por medio del method post del formulario -->
            <input type="text" class="form-control" name="contraseña" >
          </div>
          <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>    
    </div>
  </div>
</div>
</body>
</html>