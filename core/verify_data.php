<?php
header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

$data = new stdClass();
$data->is_dupe = new stdClass();
$data->is_dupe->user_id = false;
$data->is_dupe->nickname = false;

$query = "SELECT * FROM `users` WHERE user_id='".$_POST["user_id"]."'";
if ($result = mysqli_query($link, $query, MYSQLI_USE_RESULT)) {
    if ($row = mysqli_fetch_object($result)) {
//        $user_id = $row->user_id;
        $data->is_dupe->user_id = true;
        mysqli_free_result($result);
        unset($query);
    }
}

$query = "SELECT * FROM `users` WHERE nickname='".$_POST["nickname"]."'";
if ($result = mysqli_query($link, $query, MYSQLI_USE_RESULT)) {
    if ($row = mysqli_fetch_object($result)) {
        $data->is_dupe->nickname = true;
        mysqli_free_result($result);
        unset($query);
    }
}

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

                if ($data->is_dupe->user_id) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>이미 존재하는 아이디입니다.</span>";
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

                if ($data->is_dupe->nickname) {
                    $data->verified = false;
                    $data->outMsg = "<span class='text-danger'>이미 존재하는 닉네임입니다.</span>";
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

$data->user_id = verify_data($_POST["user_id"], "user_id");
$data->nickname = verify_data($_POST["nickname"], "nickname");

if ($_GET["mode"] === "ajax") {
    echo json_encode($data);
    unset($data);
}
else if ($_GET["mode"] === "process") {
    if (!($data->user_id->verified && $data->nickname->verified)) {
        echo "<script>alert('비정상적인 접근이 감지되었습니다.');</script>";
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: https://azure.mandora.xyz/dora-web/');
        exit;
    }
    else {

    }
}
?>
