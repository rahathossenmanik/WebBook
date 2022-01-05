<?php
  $books = json_decode(file_get_contents('books.json'), true);
  function read($books){
    $i = 0;
    foreach ($books as $book){
      echo '<tr>';
      echo '<td>'.$book['title'].'</td>';
      echo '<td>'.$book['author'].'</td>';
      if (!$book['available'])
        echo '<td>Not available</td>';
      else
        echo '<td>Available</td>';
      echo '<th><form action="delete.php" method="get">
        <input style="display:none;" name="index" value='.$i.'/>
        <input type="submit" value="DELETE"/></form></th>';
      echo '</tr>';
      $i = $i + 1;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Database</title>
    <style>
      th {padding: 10px;}
      td {
        padding: 10px;
        border: 1px solid #d1d1d1;
      }
      table {
        border-spacing: 0;
      }
      .book-table tr:hover{
        background-color:#ddd
      }
    </style>
  </head>
  <body>
    <form action="search.php" method="get">
      <input type="text" placeholder="Type Book Name ..." name="title" />
      <input type="submit" value="Search"/>
    </form>
    <br/>
    <table class="book-table" >
      <tr>
        <th>Book</th>
        <th>Author</th>
        <th>Availability</th>
      </tr>
      <?php
        read($books);
      ?>
    </table>
    <br/>
    <form action="insert.php" method="get">
      <input type="text" placeholder="Title" name="title" />
      <input type="text" placeholder="Author" name="author" />
      <input type="text" placeholder="Availability(true or false)" name="available" />
      <input type="text" placeholder="pages(0)" name="pages" />
      <input type="text" placeholder="ISBN(0000000000)" name="isbn" />
      <input type="submit" value="Insert"/>
    </form>
  </body>
</html>
