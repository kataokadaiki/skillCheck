<?php

function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function createCSRFToken($length) {
    $_SESSION['csrf_token'] = substr(bin2hex(random_bytes($length)), 0, $length);
}

function tokenCheck() {
    if (isset($_POST['csrf_token']) === true
        && isset($_SESSION['csrf_token']) === true
        && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            return true;
        } else {
            setError('不正なアクセスです');
            return false;
        }
}

// バリデーション
// 未入力チェック
function postExistCheck($key, $name) {
    if (isset($_POST[$key]) === false) {
        setError($name . 'を入力してください');
    } else if ($_POST[$key] === '') {
        setError($name . 'を入力してください');
    }
}
// 文字列チェック
function checkString($key) {
    if (is_string($_SESSION['post'][$key]) === false) {
        setError('不正な文字が含まれています');
    }
}
// メールアドレス形式チェック
function checkEmail($name) {
    if (filter_var($_SESSION['post']['email'], FILTER_VALIDATE_EMAIL) === false) {
        setError($name . 'の形式で入力してください');
    }
}
// 電話番号チェック
function checkTel($name) {
    if (is_numeric($_SESSION['post']['tel']) === false) {
        setError($name . 'は数字で入力してください');
    }
}

function setError($message) {
    $_SESSION['errors'][] = $message;
}

function hasError() {
    return count($_SESSION['errors']) > 0;
}

function displayPostedData($key) {
    if (isset($_SESSION['post'][$key])) {
        return $_SESSION['post'][$key];
    } else {
        return '';
    }
}

function displaySelected($key, $name) {
    if (displayPostedData($key) === $name) {
        return 'selected';
    } else {
        return '';
    }
}



