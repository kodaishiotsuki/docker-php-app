<?php

declare(strict_types=1);

// 設定ファイル読み込み
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/lib/validate.php';

// セッション開始
session_start();

// ログイン済みの場合、社員検索画面に遷移
if (isset($_SESSION["id"])) {
    header("Location: search.php");
    exit;
}

//データベース接続
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

$loginId = "";
$password = "";
$errorMessage = "";

// POST通信？
if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {

    // ログイン認証SQLの実行
    $loginId = isset($_POST['login_id']) ? $_POST['login_id'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM login_accounts WHERE login_id = :login_id";
    $stmt = $pdo->prepare($sql);  // prepareメソッドでSQLを準備
    $param = [":login_id" => $loginId];
    $stmt->execute($param);  // executeメソッドでクエリを実行
    $loginAccount = $stmt->fetch(PDO::FETCH_ASSOC);  // 結果を取得


    // ログイン認証OK？
    if (empty($loginAccount["id"])) {
        $errorMessage .= "ログインID、又はパスワードに誤りがあります。";
    } else if (password_verify($password, $loginAccount["password"]) === false) {
        $errorMessage .= "ログインID、又はパスワードに誤りがあります。";
    }

    if ($errorMessage === "") {
        // セッションIDを再生成し、セッションの固定攻撃を防ぐ
        session_regenerate_id(true);

        // セッション情報を設定
        $_SESSION["id"] = $loginAccount["id"];
        $_SESSION["login_id"] = $loginAccount["login_id"];
        $_SESSION["name"] = $loginAccount["name"];

        // 社員検索画面に遷移
        header("Location: search.php");
        exit;
    }

    // エラーメッセージ表示
}

// 各入力項目表示
$title = "ログイン";
require_once dirname(__DIR__) . '/template/login.php';
