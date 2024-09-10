<?php

// CSVファイルのパスを正しく指定
$filePath = __DIR__ . '/input.csv'; // ディレクトリのパスとファイル名を正しく結合

// CSVファイルをオープン
$fp = fopen($filePath, 'r');

// ファイルが正しくオープンできたか確認
if ($fp === false) {
    die("ファイルを開けませんでした。");
}

// ファイルを1行ずつ読み込んで出力
$lineCount = 0;
while ($data = fgetcsv($fp)) {
   $lineCount++;
    // 1行目はヘッダー行なのでスキップ
    if ($lineCount === 1) {
        continue;
    }

    // 男性と女性の人数をカウント
    if ($data[4] === '男性') {
        $maleCount++;
    }else{
        $femaleCount++;
    }
}

// ファイルをクローズ
fclose($fp);

// デバック
// echo "男性は{$maleCount}人です。\n";
// echo "女性は{$femaleCount}人です。\n";

//出力ファイルをオープン
$fpOut = fopen(__DIR__ . '/output.csv', 'w');

// へッダー行を追加
$header = ['男性', '女性'];
fputcsv($fpOut, $header);

// 男性と女性の人数を書き込む
fputcsv($fpOut, [$maleCount, $femaleCount]);

// 出力ファイルをクローズ
fclose($fpOut);


