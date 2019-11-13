<?php
//require_once "../core/db_init.php";
header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

$data = new stdClass();
$arr = array();

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
            default:
                return false;
        }

        return $data;
    }

    return false;
}

$data->user_id = verify_data($_POST["user_id"], "user_id");
$data->nickname = verify_data($_POST["nickname"], "nickname");
$arr[] = $data;
echo json_encode($arr);
unset($arr, $data);
?>
