<?php

// 入力値をうけとる
$value = $argv[1];


if($value % 3 == 0 && $value % 5 == 0) {
  // 入力値が3と5で割り切れるかどうかを判定する
  // fizzbuzzを出力
    echo "fizzbuzz\n";
} elseif($value % 3 == 0) {
  // 入力値が3で割り切れるかどうかを判定する
  // fizzを出力 
    echo "fizz\n";
} elseif($value % 5 == 0) {
  // 入力値が5で割り切れるかどうかを判定する
  // buzzを出力
    echo "buzz\n";
} else {
  // それ以外の場合は入力値をそのまま出力
    echo "$value\n";
}
?>
