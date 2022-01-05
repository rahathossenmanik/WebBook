<?php
  $books = json_decode(file_get_contents('books.json'), true);
  if($_GET['title'] && $_GET['author']){
    $book = array_search($_GET['title'], array_column( $books, 'title' ) );
    if( $book == false )
      $books[] = array(
        "title" => $_GET['title'],
        "author" => $_GET['author'],
        "available" => $_GET['available'],
        "pages" => $_GET['pages'],
        "isbn" => $_GET['isbn']);
      file_put_contents('books.json', json_encode($books));
      echo 'Book is Inserted Successfully. <a href="/WebBook/">Home</a>.';
  }
?>
