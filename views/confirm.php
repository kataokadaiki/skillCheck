<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo h($title); ?></title>
</head>
<body>
    <h1><?php echo h($title); ?></h1>
    <p>以下の内容で送信しますか？</p>
    <dl>
        <dt>件名</dt>
        <dd><?php echo h(displayPostedData('title')); ?></dd>
        <dt>氏名</dt>
        <dd><?php echo h(displayPostedData('name')); ?></dd>
        <dt>メールアドレス</dt>
        <dd><?php echo h(displayPostedData('email')); ?></dd>
        <dt>電話番号</dt>
        <dd><?php echo h(displayPostedData('tel')); ?></dd>
        <dt>お問い合わせ内容</dt>
        <dd><?php echo h(displayPostedData('body')); ?></dd>
    </dl>
    <button type="button" onclick="location.href='../index.php'">修正</button>
    <button type="button" onclick="location.href='contact.php'">登録</button>
</body>
</html>