<?php
require_once('../model/const.php');
require_once('../model/model.php');


$link = mysqli_connect('db', 'root', 'password', 'info_development');
if ($link) {
    mysqli_set_charset($link, 'utf8');
    // DB登録
    $sql = "insert into contact(title, name, email, phone, body, created_at) value('{$_SESSION['post']['title']}', '{$_SESSION['post']['name']}', '{$_SESSION['post']['email']}', '{$_SESSION['post']['tel']}', '{$_SESSION['post']['body']}', now())";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $to      = "hoge@localhost.local";
        $subject = "お問い合わせ完了確認";
        $body = "お問い合わせありがとうございました。早急にご返信致しますので今しばらくお待ちください。";
        $headers = "From: daiki@mail.com";

        $mail = mb_send_mail($to, $subject, $body, $headers);
        
        if (!$mail) {
            setError('メールの送信に失敗しました');
        }
        $title = '登録完了';
    } else {
        $title = '登録失敗';
        setError('入力に失敗しました');
    }
} else {
    $title = '登録失敗';
    setError('データベースに接続できません');
}

include_once('../views/contact.php');