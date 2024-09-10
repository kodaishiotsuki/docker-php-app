<?php
// データベース接続
$username = 'udemy_user';
$password = 'udemy_pass';
$hostname = 'db';
$database = 'udemy_db';
$pdo = new PDO("mysql:host={$hostname};dbname={$database};charset=utf8", $username, $password);


// CSVファイルのパスを正しく指定
$filePath = __DIR__ . '/import_users.csv'; // ディレクトリのパスとファイル名を正しく結合

// CSVファイルをオープン
$fp = fopen($filePath, 'r');

//トランザクション開始
$pdo->beginTransaction();

//ファイルを1行ずつ読込、終端までループ
while ($data = fgetcsv($fp)) {
    //社員番号をキーに社員情報を取得
    $sql = 'SELECT COUNT(*) AS count FROM users WHERE id = :id';
    $params = [':id' => $data[0]];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    // var_dump($data[0]);

    //SQL結果が0件の場合、新規登録
    if ($result['count'] === 0) {
      
    }else{
      var_dump($data[0]);
      var_dump("更新");
    }

  }

  //コミット
  $pdo->commit();

  //ファイルをクローズ
  fclose($fp);
