<nav class="supercointainer erpnav-container">
  <h2 style="color:black;">ERP LibroSphere</h2>

  
  <div class="erpnav">


  <form action="index.php" method="POST">
    <i class="icon-group " style="font-size: 64px;"></i>
    <input type="text" name="orders" value="orders" hidden>
    <button type="submit">Gestión Clientes</button>
  </form>

  <form action="index.php" method="POST">
    <i class="icon-book " style="font-size: 64px;"></i>
    <input type="text" name="orders" value="orders" hidden>
    <button type="submit">Gestión Libros</button>
  </form>

  <form action="index.php" method="POST">
    <i class="icon-ticket " style="font-size: 64px;"></i>
    <input type="text" name="orders" value="orders" hidden>
    <button type="submit">Gestión Pedidos</button>
  </form>
  
  </div>

</nav>

<style>
  .erpnav-container {
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
  }
  .erpnav {
    margin: 2rem;
    
    display: flex;
    flex-flow: ;
    align-items: flex-start;
    justify-content: center;
  }
  .erpnav {
    background-color: #333;
    width: auto;
    padding: 1rem;
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    border-radius: 1rem;
  }

  .erpnav>form {
 

    gap: 1rem;
    border-radius: 1rem;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
  }

  .erpnav>form>button:hover {
    filter: brightness(110%);
    cursor: pointer;

  }
  .erpnav>form>button {
    text-decoration: underline;
    width: 100%;
    background-color: transparent;
    border-radius: 1rem;  
    color: white;
    padding: 0.5rem 1rem;
    outline: none;
    border: none;
    font-size: 1.2rem;
    font-weight: bold;
    text-shadow: 0px 0px 4px black;
  
  }
</style>
