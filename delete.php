<?php
  $books = json_decode(file_get_contents('books.json'), true);
  array_splice($books, (int)$_GET['index'], 1);
  file_put_contents('books.json', json_encode($books));
  echo 'Item Deleted. <a href="/WebBook/">Go Back</a>?';
?>
