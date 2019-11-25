<?php
session_start();
?>
<?php $parent = basename(__FILE__); ?>
<?php
if (isset($_SESSION["user_id"])) {
    header('Location: /');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "core/db_init.php";

    $verify_login = true;
    $query = "SELECT * FROM `users` WHERE user_id='".$_POST["user_id"]."' and password=PASSWORD('".$_POST["password"]."')";
    if ($result = mysqli_query($link, $query, MYSQLI_STORE_RESULT)) {
        switch (mysqli_num_rows($result)) {
            case 1:
                $row = mysqli_fetch_array($result);

                //register session variables
                $redirect_url = "/";
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["nickname"] = $row["nickname"];
                $_SESSION["email"] = $row["email"];

                if (isset($_POST["redirect_url"])) {
                    $redirect_url = $_POST["redirect_url"];
                }
                header('Location: '.$redirect_url);
                break;
            case 0:
                $verify_login = false;
                break;
            default:
                trigger_error("잘못된 값이 제공되었습니다. login.php: 쿼리의 결과가 0 또는 1이 아닙니다.", E_USER_WARNING);
                echo "<script>alert('로그인 진행 중 문제가 발생하였습니다. 관리자에게 문의하세요.'); window.location.href = '/'</script>";
                exit;
        }
    }
    else {
        trigger_error("Query operation failed on DB server. mysqli_error() reported as follows: ".mysqli_error($link), E_USER_WARNING);
        echo "<script>alert('로그인 진행 중 문제가 발생하였습니다. 관리자에게 문의하세요.'); window.location.href = '/'</script>";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - dora</title>
    <?php include("vendor-css.php"); ?>
</head>

<body>
<?php include("nav.php"); ?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">로그인</h2>
                <?php if (isset($verify_login) && $verify_login === false): ?>
                    <p class='text-danger'>아이디 또는 비밀번호가 일치하지 않습니다.</p>
                <?php else: ?>
                    <p>계속하려면 로그인하세요.</p>
                <?php endif; ?>
            </div>
            <form id="loginForm" method="post" action="login">
                <?php if (isset($_GET["redirect_url"])): ?>
                <input type='hidden' name='redirect_url' value='<?=$_GET["redirect_url"]?>' />
                <?php elseif (isset($_POST["redirect_url"])): ?>
                <input type='hidden' name='redirect_url' value='<?=$_POST["redirect_url"]?>' />
                <?php endif; ?>
                <div class="form-group"><label for="username">아이디</label><input class="form-control item" type="text" id="username" name="user_id"><label id="verify_user_id"></label></div>
                <div class="form-group"><label for="password">비밀번호</label><input class="form-control item" type="password" id="password" name="password"><label id="verify_password"></label></div>
                <!--                <div class="form-group">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">자동 로그인</label></div>-->
                <!--                </div>-->
                <button class="btn btn-success btn-block" type="submit">로그인</button>
                <button class="btn btn-block btn-outline-success" type="button" onclick="location.href = 'join'">회원가입</button>
            </form>
        </div>
    </section>
</main>
<?php include("footer.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>