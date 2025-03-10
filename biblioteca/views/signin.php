<div class=" superblur">
  <div id="blur"></div>
  <div class="supercontainer ">
    <form action="index.php" method="POST" class="form_signin">

      <div>
        <label for="user">User</label>
        <input type="text" name="user" id="user" placeholder="admin" value="<?php if (isset($_SESSION['user'])) {
          $_SESSION['user'];
        } ?>">
      </div>

      <div>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass">
      </div>

      <button type="submit">
        <i class="icon-off " style="font-size: 1rem;"></i>
        Iniciar Session
      </button>
    </form>

  </div>
</div>



<style>
  .superblur {
    position: relative;
    overflow: hidden;
    min-height: 80vh;
  }

  #blur {
    background-image: url('https://i.pinimg.com/736x/8e/df/4b/8edf4b2330d25b1ca1d85b69f7538d2e.jpg');
    background-size: contain;
    background-repeat: no-repeat;

    height: 100vh;
    left: 0;

    position: absolute;
    right: -5%;
    top: 0;
    width: 110%;
    z-index: -2;
    animation: kenburns-top 3s ease-out both;
  }

  .form_signin {
    box-shadow: 0px 0px 4px black;
    border-radius: 1rem;
    margin: 0 auto;
    padding: 1rem;

    background: #444;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
  }

  .form_signin>div {
    display: flex;
    flex-flow: column nowrap;
    gap: 0.5rem;
  }


  .form_signin>div>input {
    border: none;
    background-color: #111;
    border-radius: 8px;
    color: white;
    padding: 1rem;
    font-size: 1rem;
    outline: none;

  }

  .form_signin>div>label {
    font-weight: bold;
    text-shadow: 0px 0px 8px black;
  }

  .form_signin>button {
    border-radius: 8px;
    border: none;
    background-color: green;
    color: white;
    padding: 1rem;
    font-size: 1rem;
    text-shadow: 0px 0px 8px black;
    box-shadow: 0px 0px 4px black;

  }

  .form_signin>button:hover {
    background-color: teal;
    cursor: pointer;

  }
</style>

