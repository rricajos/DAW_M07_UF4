<?php

class User
{
  private $id;
  private $user;
  private $pass;

  private $role;

  public function __construct($id, $user, $pass, $role)
  {
    $this->id = $id;
    $this->user = $user;
    $this->pass = $pass;
    $this->role = $role;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function getPass()
  {
    return $this->pass;
  }
  public function setPass($pass)
  {
    $this->pass = $pass;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
  }

}