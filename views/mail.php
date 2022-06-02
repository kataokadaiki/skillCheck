<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>
    <p>お問い合わせありがとうございます。</p>
    <p>以下の内容で受け付けました。</p>
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
</body>
</html>