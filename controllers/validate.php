<?php
require_once('../model/const.php');
require_once('../model/model.php');

postExistCheck('title', '件名');
postExistCheck('name', 'お名前');
postExistCheck('email', 'メールアドレス');
postExistCheck('tel', '電話番号');
postExistCheck('body', 'お問い合わせ内容');

foreach ($_POST as $key=>$post) {
    $_SESSION['post'][$key] = $post;
}

checkString('title');
checkString('name');
checkString('body');
checkEmail('メールアドレス');
checkTel('電話番号');

if (hasError()) {
    header('Location:../index.php');
} else {
    header('LOcation:./confirm.php');
}
