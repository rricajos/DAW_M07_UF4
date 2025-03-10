<?php
require_once __DIR__ . '/../models/Book.php';

class BookController
{
  // Libro seleccionado por el User del cual se tiene todos los detalles de libreria.xml
  private Book $book;

  // Array de solo los ISBN de los libros como llaves primarias.
  private array $isbns = [];

  // Propiedad para almacenar el XML
  private SimpleXMLElement $xml;

  public function __construct()
  {
    // Cargar el archivo XML solo una vez
    $this->xml = simplexml_load_file('libreria.xml');

    // Recorrer el archivo y extraer los ISBNs
    foreach ($this->xml->libro as $libro) {
      $isbn = (string) $libro->isbn;
      $this->isbns[] = $isbn;
    }
  }

  // Método para devolver todos los ISBNs
  public function getIsbns(): array
  {
    return $this->isbns;
  }

  // Método para seleccionar un libro por ISBN
  public function getBookByIsbn(string $isbn): ?Book
  {
    // Buscar el libro con el ISBN correspondiente en el XML previamente cargado
    foreach ($this->xml->libro as $libro) {

      if ((string) $libro->isbn === $isbn) {

        // Crear un objeto Book con los detalles del libro
        $this->book = new Book(
          (string) $libro->titulo,
          (string) $libro->autor,
          (string) $libro->categoria,
          (string) $libro->isbn,
          (int) $libro->edicion,
          (string) $libro->promocion === 'si',
          new DateTime((string) $libro->fecha),
          (string) $libro->portada
        );

        return $this->book;
      }
    }

    // Si no se encuentra el libro
    return null;
  }
}
