<?php
// データベース接続
$username = 'udemy_user';
$password = 'udemy_pass';
$hostname = 'db';
$database = 'udemy_db';
$pdo = new PDO("mysql:host={$hostname};dbname={$database};charset=utf8", $username, $password);

// 社員情報取得SQLの実行
$sql = 'SELECT * FROM users ORDER BY id';
$stmt = $pdo->prepare($sql);
$stmt->execute();

// SQL結果を1行づつ読み込み終端までループ
$outputData = [];
$dataCount = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  // 出力データの作成
  $outputData[$dataCount]['id'] = $row['id'];
  $outputData[$dataCount]['name'] = $row['name'];
  $outputData[$dataCount]['name_kana'] = $row['name_kana'];
  $outputData[$dataCount]['birthday'] = $row['birthday'];
  $outputData[$dataCount]['gender'] = $row['gender'];
  $outputData[$dataCount]['organization'] = $row['organization'];
  $outputData[$dataCount]['start_date'] = $row['start_date'];
  $outputData[$dataCount]['tel'] = $row['tel'];
  $outputData[$dataCount]['mail_address'] = $row['mail_address'];
  $outputData[$dataCount]['created'] = $row['created'];
  $outputData[$dataCount]['updated'] = $row['updated'];
  $dataCount++;
}

// 出力ファイルのオープン
$fpOut = fopen(__DIR__ . '/export_users.csv', 'w');

// ヘッダー行の書き込み
$header = ['id', 'name', 'name_kana', 'birthday','gender','organization','start_date','tel','mail_address','created','updated'];
fputcsv($fpOut, $header);

// 出力データ数分ループ
foreach ($outputData as $data) {
  // 出力データの書き込み
  fputcsv($fpOut, $data);
}

// 出力データの書き込み
fputcsv($fpOut, $outputData);


// 出力ファイルをクローズ
fclose($fpOut);


