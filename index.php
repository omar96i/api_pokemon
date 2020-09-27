<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesion</title>
  <link rel="stylesheet" href="css/estilos_inicio.css">
  <script src="js/jquery-3.5.1.js"></script>
  <script src="js/js_api_inicio.js"></script>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <form class="register-form">
        <p class="mensaje_error"></p>
        <input type="text" id="name_registro" placeholder="Nombre completo"/>
        <input type="email" id="email_registro" placeholder="Correo electronico"/>
        <input type="password" id="pass_registro" placeholder="Contraseña"/>
        <button id="crear_usuario">Crear usuario</button>
        <p class="message">Inicia sesion</p>
      </form>
      <form class="login-form">
        <p class="mensaje_error2"></p>
        <input type="email" id="email" placeholder="Email"/>
        <input type="password" id="password" placeholder="Password"/>
        <button class="ingresar">Iniciar Sesion</button>
        <p class="message">Registrate</p>
      </form>
    </div>
  </div>
</body>
</html>