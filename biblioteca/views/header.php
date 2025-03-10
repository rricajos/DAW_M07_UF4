<header class="superheader">

  <div class="supercontainer">

    <div>
      <h1>LibroSphere</h1>
      <h3>
        <?php

        if (isset($_SESSION['logged_color'])) {
          echo "
          
          <strong class='user_status_container'>
            <div class='user_status' style='background-color: {$_SESSION['logged_color']}'>
            </div>
      
            <div>{$_SESSION['logged_text']}</div>
          </strong>";
        } else {
          echo "Estado desconocido";
        }
        ?>

      </h3>
    </div>



    <a class="superheader-user">

      <p>

        <?php

        if (isset($_SESSION['user_name'])) {

          include_once 'views/signout.php';

        }
        ?>
      </p>

    </a>

  </div>

</header>

<style>
  .user_status {
    width: 10px;
    height: 10px;

    border-radius: 50%;
  }

  .user_status_container {
    display: flex;
    flex-flow: row nowrap;
    align-items: baseline;
    gap: 1rem;
  }
</style>
