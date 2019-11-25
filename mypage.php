<?php
session_start();
?>
<?php $parent = basename(__FILE__); ?>
<?php
if (!isset($_SESSION["user_id"])) {
    header('Location: /');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mode = "join";
    $db_check = "true";
    require_once "core/verify_data.php";
    if (!($data->user_id->verified &&
        $data->nickname->verified &&
        $data->pass->verified &&
//        $data->pass_confirm->verified &&
        $data->email->verified)) {
        echo "<script>alert('비정상적인 접근이 감지되었습니다.'); window.location.href = '/'</script>";
//            header('HTTP/1.1 301 Moved Permanently');
//            header('Location: https://azure.mandora.xyz/dora-web/');
        exit;
    }

    $query = "SELECT * FROM `users` WHERE user_id='".$_POST["user_id"]."' and password=PASSWORD('".$_POST["password"]."')";
    if ($result = mysqli_query($link, $query, MYSQLI_STORE_RESULT)) {
        switch (mysqli_num_rows($result)) {
            case 1:
                $row = mysqli_fetch_array($result);

                $redirect_url = "/";
                $new_query = "UPDATE `users` SET nickname='".$_POST["nickname"]."', email='".$_POST["email"]."' where user_id='".$_POST["user_id"]."'";

                if (mysqli_query($link, $new_query, MYSQLI_USE_RESULT)) {
                    if (isset($_POST["redirect_url"])) {
                        $redirect_url = $_POST["redirect_url"];
                    }

                    //update session variables
                    $_SESSION["nickname"] = $_POST["nickname"];
                    $_SESSION["email"] = $_POST["email"];
                    echo "<script>alert('회원정보 수정이 완료되었습니다.'); window.location.href = '.".$redirect_url.".'</script>";
//                        header('Location: '.$redirect_url);
                }
                break;
            default:
                trigger_error("잘못된 값이 제공되었습니다. mypage.php: 쿼리의 결과가 1이 아닙니다.", E_USER_WARNING);
                echo "<script>alert('비밀번호가 일치하지 않습니다.'); window.location.href = '/mypage'</script>";
                exit;
        }
    }
    else {
        trigger_error("Query operation failed on DB server. mysqli_error() reported as follows: ".mysqli_error($link), E_USER_WARNING);
        echo "<script>alert('작업 처리 중 문제가 발생하였습니다. 관리자에게 문의하세요.'); window.location.href = '/'</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <title>Mypage - dora</title>
    <?php include("vendor-css.php"); ?>
</head>

<body>
<?php include("nav.php"); ?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">내 정보 관리</h2>
                <p>등록된 정보를 관리할 수 있습니다.</p>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs nav-justified justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#modify-user">회원정보 수정</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cancel-user">회원탈퇴</a>
                        </li>
                    </ul>
                    <form id="mypageForm" class="tab-content" method="post" action="mypage">
                        <div class="tab-pane fade show active" id="modify-user">
                            <?php if (isset($_GET["redirect_url"])): ?>
                                <input type='hidden' name='redirect_url' value='<?=$_GET["redirect_url"]?>' />
                            <?php elseif (isset($_POST["redirect_url"])): ?>
                                <input type='hidden' name='redirect_url' value='<?=$_POST["redirect_url"]?>' />
                            <?php endif; ?>
                            <div class="form-group"><label for="username">아이디</label><input class="form-control item" type="hidden" id="username" name="user_id" value="<?=$_SESSION["user_id"]?>"><br/><label id="show_user_id"><?=$_SESSION["user_id"]?></label></div>
                            <div class="form-group"><label for="password">기존 비밀번호</label><input class="form-control item" type="password" id="password" name="password"><label id="verify_password"></label></div>
                            <div class="form-group"><label for="nick">닉네임</label><input class="form-control item" type="text" id="nick" name="nickname" value="<?=$_SESSION["nickname"]?>"><label id="verify_nickname"></label></div>
                            <div class="form-group"><label for="email">E-mail</label><input class="form-control item" type="email" id="email" name="email" value="<?=$_SESSION["email"]?>"><label id="verify_email"></label></div>
                            <button class="btn btn-success btn-block" type="button" onclick="verify_mypage('submit')">수정 완료</button>
                        </div>
                        <div class="tab-pane fade" id="cancel-user">
                            <p>회원 탈퇴할 경우 사용 중이던 닉네임은 다른 사용자가 사용할 수 있게 됩니다. 계속하시겠습니까?</p>
                            <div class="form-group"><label for="password">기존 비밀번호</label><input class="form-control item" type="password" id="c_password" name="c_password"><label id="c_message" class="text-danger">현재 회원 탈퇴는 지원되지 않습니다.</label></div>
                            <button class="btn btn-success btn-block" type="button">회원 탈퇴</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/js/mypage.js"></script>
<?php include("footer.php"); ?>
</body>
</html>