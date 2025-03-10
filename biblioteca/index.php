<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <style>
    body {
      background-color: #DED9D3;
      color: white;
      margin: 0;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
    }

    .supercontainer {
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      padding: 1rem;
    }

    .superheader {
      box-shadow: 0px 0px 8px black;
      background-color: #222;
    }
  </style>
</head>

<body>
  <?php


  // Vista por defecto
  $view = 'views/signin.php';

  // Controlador de User
  require_once 'controllers/UserController.php';
  $userController = new UserController();

  // Verificar si se envió el formulario de inicio de sesión
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['signout'])) {

      // caso de envio automatico del formulario signout.php
      if (isset($_SESSION['loggout_time']) && time() >= $_SESSION['loggout_time']) {
        $_SESSION['logged_color'] = 'yellow';
        $_SESSION['logged_text'] = 'Session cerrada por superar el tiempo limite de session';

      } else {
        // caso de envio voluntario del formulario signout.php
        $userController->signout();
        $_SESSION['logged_color'] = 'green  ';
        $_SESSION['logged_text'] = 'Session cerrada voluntariamente';

      }

    } else {

      // Intento de inicio de sesión
      if ($userController->signin($_POST['user'], $_POST['pass'])) {


        // Solo establecer tiempos la primera vez que el usuario se loguea
        $_SESSION['loggin_time'] = time();
        $_SESSION['loggout_time'] = $_SESSION['loggin_time'] + (30 * 60);

        $_SESSION['logged'] = true;
        $_SESSION['logged_color'] = 'green';
        $_SESSION['logged_text'] = 'Session inicada por @' . $_SESSION['user_name'] . ' a las ' . date("H:i", $_SESSION['loggin_time']);


      } else {
        $_SESSION['logged_color'] = 'red';
        $_SESSION['logged_text'] = 'Los datos introducidos son incorrectos';
      }
    }

    header('Location:index.php');
  }


  // Verificar si ya hay una sesión iniciada
  if (isset($_SESSION['logged_color']) && $_SESSION['logged_color'] !== 'purple') {

    // Verifica si la sesión ha expirado la sesion (alomejor el usurio ha desabilitado el js de signout.php)
    if (isset($_SESSION['loggout_time']) && time() >= $_SESSION['loggout_time']) {

      $userController->signout();
      $_SESSION['logged_color'] = 'yellow';
      $_SESSION['logged_text'] = 'Session cerrada por superar el tiempo limite de session';

    } else {

      // Gestiona la vista segun su rol
      if (isset($_SESSION['user_role'])) {

        // Muestra una vista diferente segun su rol
        switch ($_SESSION['user_role']) {

          case 'admin':
            $view = 'views/erp.php';
            break;

          case 'user':
            $view = 'views/books.php';
            break;

          default:
            $userController->signout();
        }

      }


    }

  } else {
    $_SESSION['logged_color'] = 'purple';
    $_SESSION['logged_text'] = 'Bienvenido!';
  }

  // finalemente montamos la vista
  include_once 'views/header.php';
  include_once $view;
  include_once 'views/footer.php';
  ?>
</body>

</html>