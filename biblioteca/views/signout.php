<form action="index.php" method="POST" id="signout-form">
    <input type="text" name="signout" value="signout" hidden>
    <button type="submit" class="superheader-user-button" id="signout-button">  
        <i class="icon-off" style="font-size: 32px;"></i>
        <span id="countdown">
            <?php
            if (isset($_SESSION['loggout_time'])) {
                echo $_SESSION['loggout_time'] - time();
            }
            ?>
        </span>
    </button>
</form>

<style>
  .superheader-user-button {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    gap: 0.5rem;
    align-items: center;
    border-radius: 1rem;
    padding: 0.5rem 1rem;
    background-color: red;
    border: none;
    box-shadow: 0px 6px 0px 0px brown;
    color: white;
    font-weight: bold;
  }

  .superheader-user-button:hover {
    transform: translateY(-2px);
    box-shadow: 0px 8px 0px 0px brown;
    background-color: red;
    cursor: pointer;
  }

  .superheader-user-button:active {
    transform: translateY(2px);
    box-shadow: 0px 4px 0px 0px brown;
  }
</style>

<script>
    // Esperamos a que el contenido de la página esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        const countdownElement = document.getElementById('countdown');
        const form = document.getElementById('signout-form');
        let countdown = parseInt(countdownElement.textContent); // Obtenemos el tiempo restante
        
        const intervalId = setInterval(() => {
            if (countdown > 0) {
                countdown--;
                countdownElement.textContent = countdown; // Actualizamos el texto del contador
            } else {
                clearInterval(intervalId); // Limpiamos el intervalo cuando llega a 0
                form.submit(); // Enviamos el formulario automáticamente
            }
        }, 1000); // Actualiza cada segundo
    });
</script>
