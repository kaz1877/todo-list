<?php
    require_once("db_connect.php");

    $search = $_POST['search'];
    $search_word =$_POST['search_word'];

    $pdo = db_connect();
    try{
        $sql = "SELECT * FROM posts ORDER BY time";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
    }catch(PDOException $e){
        echo $e -> getMessage();
        die();
    }

    if(!empty($search) && !empty($search_word)){
      $search_pdo = db_connect();
      try{
        $search_sql = "SELECT * FROM posts WHERE content LIKE '%$search_word%'";
        $stmt = $search_pdo -> prepare($search_sql);
        $stmt -> execute();
      }catch(PDOException $e){
        echo $e -> getMessage();
        die();
      }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>メインページ</title>
  </head>
  <body>
    <h1>メインページ</h1>
    <a href="create.php" ><button type="button" class="btn btn-primary">新規登録</button></a>
    <br>
    <form action="" method="POST">
      検索キーワード：<input type="text" name="search_word"> <br>
      <input type="submit" name="search" value="検索">
    </form>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">記事ID</th>
            <th scope="col">タイトル</th>
            <th scope="col">本文</th>
            <th scope="col">作成日</th>
            <th scope="col">編集</th>
            <th scope="col">削除</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo $row["content"]; ?></td>
              <td><?php echo $row["time"]; ?></td>
              <td><a href="edit.php?id=<?php echo $row['id'];?>">編集</a></td>
              <td><a href="delete.php?id=<?php echo $row['id'];?>">削除</a></td>
            </tr>
          <?php endwhile; ?>

        </tbody>
      </table>
  </body>
</html>