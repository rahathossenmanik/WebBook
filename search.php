<?php
  $books = json_decode(file_get_contents('books.json'), true);
  $found = array_search($_GET['title'], array_column( $books, 'title' ) );
    if($found == true)
      echo $_GET['title'].' is available. <a href="https://manikarea.com">Borrow</a>?';
    else echo $_GET['title'].' is not available. <a href="/WebBook/">Insert</a>?';
?>
