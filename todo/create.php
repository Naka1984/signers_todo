<?php
    // DB接続のファイルを読み込む（db_connectメソッドを使いたいから）
    require('db_connect.php');

    // form送信された値を受け取る
    $title   = $_POST["title"];
    $content = $_POST["content"];
    $submit  = $_POST["submit"];

    // 送信ボタンが押されたらという条件
    if (!empty($submit)) {
        $pdo = db_connect();
        try {
            // タイトルと本文はこの時点では何が入るかわからないので「:◯◯」という形
            $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->execute();
    
            // 登録完了したらmain.phpへ戻る
            header("Location: main.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
          die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/style.css"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="sidemenu.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet"  href="css/styles.css"/>
</head>

<body>
<div class="slidemenu slidemenu-left">
    <div class="slidemenu-header">
      <div>
        メニュー画面
      </div>
    </div>
    <div class="slidemenu-body">
      <ul class="slidemenu-content">
        <li><a class="menu-item" href="">タスク管理</a></li>
        <li><a class="menu-item" href="">修正依頼</a></li>
        <li><a class="menu-item" href="create.php">新規登録</a></li>
        <li><a class="menu-item" href="">Menu 4</a></li>
        <li><a class="menu-item" href="">Menu 5</a></li>
        <!-- <li><a class="menu-item" href="">Menu 6</a></li>
        <li><a class="menu-item" href="">Menu 7</a></li>
        <li><a class="menu-item" href="">Menu 8</a></li>
        <li><a class="menu-item" href="">Menu 9</a></li>
        <li><a class="menu-item" href="">Menu 10</a></li>
        <li><a class="menu-item" href="">Menu 11</a></li>
        <li><a class="menu-item" href="">Menu 12</a></li>
        <li><a class="menu-item" href="">Menu 13</a></li>
        <li><a class="menu-item" href="">Menu 14</a></li>
        <li><a class="menu-item" href="">Menu 15</a></li>
        <li><a class="menu-item" href="">Menu 16</a></li>
        <li><a class="menu-item" href="">Menu 17</a></li>
        <li><a class="menu-item" href="">Menu 18</a></li>
        <li><a class="menu-item" href="">Menu 19</a></li>
        <li><a class="menu-item" href="">Menu 20</a></li>
        <li><a class="menu-item" href="">Menu 21</a></li>
        <li><a class="menu-item" href="">Menu 22</a></li>
        <li><a class="menu-item" href="">Menu 23</a></li>
        <li><a class="menu-item" href="">Menu 24</a></li>
        <li><a class="menu-item" href="">Menu 25</a></li>
        <li><a class="menu-item" href="">Menu 26</a></li>
        <li><a class="menu-item" href="">Menu 27</a></li>
        <li><a class="menu-item" href="">Menu 28</a></li>
        <li><a class="menu-item" href="">Menu 29</a></li>
        <li><a class="menu-item" href="">Menu 30</a></li> -->
      </ul>
    </div>
  </div>

  <div id="main" >
    <header id="header">
      <span class="button menu-button-left">
      </span>
      <!-- <div><img src="img/signers_logo_header.png" alt="ロゴ" style="padding-left: 60px; padding-top: 5px"></div> -->
    </header>
    <!-- <div id="contents">
      <h1>SpSlideMenu Demo</h1>
      <p><a href="demo1.html">Demo 1</a> : Standard</p>
      <p><a href="demo2.html">Demo 2</a> : No Header</p>
      <p><a href="demo3.html">Demo 3</a> : Right</p>
      <p><a href="demo4.html">Demo 4</a> : Left And Right</p> -->
    <!-- </div> -->
  

    <div class="title-area">
        <h1>新規登録</h1><br><br>
    </div>
    <div style='padding-bottom:3%;'><a href="main.php" style="color: black;">メイン画面に戻る</a></div>
    <form action="" method="POST">
        <input type="text" class="input-area" name="title" placeholder="Title" required> <br>
        <input type="text" class="input-area" name="content" placeholder="Content" required> <br>
        <input type="submit" class="input-area submit" name="submit" value="登録">
    </form>

    <script type="text/javascript" src="sp-slidemenu.js"></script>
  <script>
    var menu = SpSlidemenu({
      main : '#main',
      button: '.menu-button-left',
      slidemenu : '.slidemenu-left',
      direction: 'left'
    });
  </script>
</body>

</html>