<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

if (isset($mode)) {
    $_GET["mode"] = $mode;
}

if (isset($db_check)) {
    $_GET["db_check"] = $db_check;
}

$data = new stdClass();

function verify_data($string, $mode) {
    $data = new stdClass();

    if (!empty($string)) {
        $data->verified = true;

        switch ($mode) {
            case "user_id":
                $data->outMsg = "<span class='text-success'>사용 가능한 아이디입니다.</span>";

                if (preg_match("/^[A-Za-z0-9]+$/", $string) == false) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>아이디는 영문자 또는 숫자만 사용 가능합니다.</span>";
                }

                if (strlen($string) > 20) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>아이디의 길이는 최대 20자까지만 허용됩니다.</span>";
                }
                break;
            case "nickname":
                $data->outMsg = "<span class='text-success'>사용 가능한 닉네임입니다.</span>";

                if (preg_match("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", $string) != false) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>닉네임에는 특수문자를 사용할 수 없습니다.</span>";
                }

                if (strlen($string) > 20) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>닉네임의 길이는 최대 20자까지만 허용됩니다.</span>";
                }
                break;
            case "password":
                $data->outMsg = "<span class='text-success'>사용 가능한 비밀번호입니다.</span>";

                if (strlen($string) < 8) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>비밀번호의 길이는 최소 8자이어야 합니다.</span>";
                }

                if (strlen($string) > 30) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>비밀번호의 길이는 최대 30자까지만 허용됩니다.</span>";
                }
                break;
            case "password_confirm":
                $data->outMsg = "<span class='text-success'>비밀번호가 일치합니다.</span>";

                if (strcmp($string, $_POST["password"]) !== 0) { //not equal
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>비밀번호가 일치하지 않습니다.</span>";
                }
                break;
            case "email":
                $data->outMsg = "<span class='text-success'>사용 가능한 이메일입니다.</span>";

                if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $string) == false) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>올바른 이메일 형식이 아닙니다.</span>";
                }
                break;
            default:
                return false;
        }

        return $data;
    }

    $data->verified = false;
    $data->outMsg = "<span class='text-danger'>내용을 입력해 주세요.</span>";
    return $data;
}

function dupe_check() {
    global $data, $link;

    $query = "SELECT * FROM `users` WHERE user_id='".$_POST["user_id"]."'";
    if ($result = mysqli_query($link, $query, MYSQLI_STORE_RESULT)) {
        if (mysqli_num_rows($result) !== 0) {
            $data->user_id->verified = false;
            $data->user_id->outMsg = "<span class='text-danger'>이미 존재하는 아이디입니다.</span>";
            mysqli_free_result($result);
        }
    }
    unset($query);

    $query = "SELECT * FROM `users` WHERE nickname='".$_POST["nickname"]."'";
    if ($result = mysqli_query($link, $query, MYSQLI_STORE_RESULT)) {
        if (mysqli_num_rows($result) !== 0) {
            $data->nickname->verified = false;
            $data->nickname->outMsg = "<span class='text-danger'>이미 존재하는 닉네임입니다.</span>";
            mysqli_free_result($result);
        }
    }
    unset($query);
}



$data->user_id = verify_data($_POST["user_id"], "user_id");
$data->pass = verify_data($_POST["password"], "password");
if ($_GET["mode"] === "join") {
    $data->nickname = verify_data($_POST["nickname"], "nickname");
    $data->pass_confirm = verify_data($_POST["password_confirm"], "password_confirm");
    $data->email = verify_data($_POST["email"], "email");
}

if ($_GET["mode"] === "join" && $_GET["db_check"] === "true") {
    require "db_init.php";
    dupe_check();
}
else if ($_GET["mode"] === "login" && $_GET["type"] !== "ajax") {
    trigger_error("잘못된 인자 값이 제공되었습니다. verify_data.php: mode=login 이려면 type=ajax 이어야 합니다.", E_USER_WARNING);
    exit;
}
else if ($_GET["db_check"] === "true") {
    trigger_error("잘못된 인자 값이 제공되었습니다. verify_data.php: db_check=true 이려면 mode=join 이어야 합니다.", E_USER_WARNING);
    exit;
}

if ($_GET["type"] === "ajax") {
    header("Content-Type:application/json");
    echo json_encode($data);
    if ($_GET["db_check"] === "true") {
        mysqli_close($link);
    }
    unset($data);
    exit;
}
?>
