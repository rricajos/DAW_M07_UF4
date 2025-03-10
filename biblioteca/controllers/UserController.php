<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{

  public function __construct()
  {
    session_start();
  }

  public function signout()
  {
    $_SESSION = [];
  }

  public function signin($user, $pass)
  {
    if (empty($user) || empty($pass)) {

      echo 'Porfavor introduzca todos los datos solicitados';
      
    } else {

      $u = new User(0, $user, $pass, '');

      if ($user ===  "admin" && $pass === "abcdef") {
        $u->setRole('admin');
        $u->setId(1);
        $this->session($u);
        return true;

      } elseif ($user === "user" && $pass === "123456") {
        $u->setRole('user');
        $u->setId(1234);
        $this->session($u);
        return true;

      } else {

        echo 'Usuario no encontrado';
     
      }
    }
    return false;
  }

  public function session(User $user)
  {
    $_SESSION['user_id'] = $user->getId();
    $_SESSION['user_name'] = $user->getUser();
    $_SESSION['user_role'] = $user->getRole();
  }

}
