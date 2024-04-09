<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperacion de contraseña</title>
    <link href='css/stile.css' rel='stylesheet' type='text/css'>
</head>
<body> 
    <div class="page">
        <div class="container">
          <div class="left">
            <div class="login">
                <h2>Recuperación de contraseña</h2>
                
            </div>
          </div>
          <div class="right">
          
              <div class="login-page">
                <div class="form">
                 
                  <h3>Ingrese su correo electrónico para restablecer contraseña</h3>
                  <br>
                  <!--Se genera un formulario el cual manda el valor 
                    de las variables por method post y así mismo genera 
                    una llamada al controlador validar.php al cual envía
                     los datos por medio de un action
                    -->
                    <form class="login-form" method="POST" action="controlador/ValidarCorre.php">
                    <!--Genera el espacio para introducir el id del usuario y envía el dato usuario
                      por medio del method post del formulario
                      -->
                    <input type="email" placeholder="Correo" name="usuario" required>
                    <!--Genera el espacio para introducir clave del usuario y envía el dato clave
                      por medio del method post del formulario
                      -->
                    
                    
                    <button>enviar</button>

                  </form>
                  <br>
                  <a href="index.php" class="forgot__password--link">Atras</a>
                </div>
              </div>
              </form>
              
              </div> 
            
          </div>
        </div>
      </div>
</body>
</html>