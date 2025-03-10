<?php
// Controlador de Books
require_once 'controllers/BookController.php';
$bookController = new BookController();
$isbns = $bookController->getIsbns();

echo "<main class='books'>";

// Recorrer los libros
foreach ($isbns as $isbn) {
  $book = $bookController->getBookByIsbn($isbn);

  // Asegúrate de que el libro no sea nulo
  if ($book !== null) {
    echo "<form action='javascript:void(0);' method='POST' class='book-card' onsubmit='alert(\"El formulario no es funcional en este momento.\"); return false;'>";

    echo "<div class='book-image'>";

    echo "<img src='images/" . htmlspecialchars($book->getCover()) . "' alt='" . htmlspecialchars($book->getTitle()) . " cover' width='auto'>";
    echo "</div>"; // Cierra el div de la imagen

    echo "<div class='book-details'>"; // Abre el div para los detalles del libro
    echo "<h2>" . htmlspecialchars($book->getTitle()) . "</h2>";
    echo "<h3>" . htmlspecialchars($book->getAuthor()) . "</h3>";
    echo "<p>Categoría: " . htmlspecialchars($book->getCategory()) . "</p>";
    echo "<p>ISBN: " . htmlspecialchars($book->getIsbn()) . "</p>";
    echo "<p>Fecha: " . htmlspecialchars($book->getReleaseDate()->format('Y-m-d')) . "</p>";
    echo "</div>"; // Cierra el div de detalles

    echo "<div class='buttons'>";
    // Botón de compra con diseño mejorado
    echo "<button type='submit'>Comprar " . htmlspecialchars($book->getEdition()) . "ª edición</button>";
    if ($book->isPromotion()) {
      echo "<span class='discount-span'>Desc. del 30%</span>";
    }
    echo "</div>"; // Cierra el div de botones

    echo "</form>";
  }
}

echo "</main>";
?>

<style>
  .books {
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1rem;
    margin: 1rem auto;
  }

  .book-card {
    background-color: #222;
    color: white;
    border: none;
    border-radius: 1rem;
    box-shadow: 0 0px 10px rgba(0, 0, 0, 0.5);
    padding: 15px;
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
  }

  .book-card:hover {
    transform: scale(1.02);
  }

  .book-image {
    text-align: center;
    margin-bottom: 10px;
    position: relative;
  }



  .book-image img {
    max-width: 100%;
    height: auto;
  }

  .buttons {
    display: flex;
    flex-flow: column-reverse nowrap;
    justify-content: center;
    margin-top: 10px;

  }

  .buttons button {
    background-color: #FFD814;
    border: none;
    border-radius: 5px;
    color: #0F1111;
    cursor: pointer;
    padding: 12px 20px;
    margin: 0 5px 5px 5px;
    font-size: 1em;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
  }

  .buttons button:hover {
    background-color: #F7CA00;
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  .discount-span {
    width: 90%;
    margin: 5px 5px 0 10px;
    background-color: #B12704;
    color: #fff;
    font-weight: bold;
    text-shadow: 0px 0px 1px black;
    border: none;
    padding: 5px 5px 0 5px;
    text-align: left;
    border-radius: 1rem 100% 0 0;
  }



  .book-details {
    text-align: left;
    flex-grow: 1;
  }

  .book-details h2 {
    color: white;
    font-size: 1.5em;
    margin: 5px 0;
  }

  .book-details h3 {
    font-size: 1.2em;
    color: #ddd;
    margin: 5px 0;
  }

  .book-details p {
    margin: 5px 0;
    color: #ddd;
    font-size: 0.9em;
  }
</style>
