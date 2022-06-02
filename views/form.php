<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?php echo h($title); ?></h1>
    <p><small class="mark">※</small>全項目入力必須です</p>
    <ul>
        <?php foreach ($_SESSION['errors'] as $error) { ?>
        <li id="error"><?php echo h($error); ?></li>
        <?php } ?>
        <?php $_SESSION['errors'] = []; ?>
    </ul>

    <form method="POST" action="controllers/validate.php">
    <input type='hidden' name='csrf_token' value='<?= $_SESSION['csrf_token']; ?>'>
        <table>
            <tr>
                <th><label for="title">件名</label></th>
                <td>
                    <select id="title" name="title">
                        <option></option>
                        <?php foreach ($titles as $t) { ?>
                        <option <?php echo h(displaySelected('title', $t)) ?>><?php echo h($t); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="name">お名前</label></th>
                <td><input id="name" type="textbox" name="name" value="<?php echo h(displayPostedData('name')) ?>"></td>
            </tr>
            <tr>
                <th><label for="email">email</label></th>
                <td><input id="email" type="textbox" name="email" value="<?php echo h(displayPostedData('email')) ?>"></td>
            </tr>
            <tr>
                <th><label for="tel">電話番号</label></th>
                <td><input id="tel" type="text" name="tel" value="<?php echo h(displayPostedData('tel')) ?>"></td>
            </tr>
            <tr>
                <th><label for="body">お問い合わせ</label></th>
                <td><textarea name="body" rows="5" cols="40"><?php echo h(displayPostedData('body')) ?></textarea></td>
            </tr>
        </table>
        <input type="submit" value="確認">
    </form>
</body>
</html>