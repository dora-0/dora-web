<?php $parent = __FILE__; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once "core/verify_data.php";
        if (!($data->user_id->verified &&
            $data->nickname->verified &&
            $data->pass->verified &&
            $data->pass_confirm->verified &&
            $data->email->verified)) {
            echo "<script>alert('비정상적인 접근이 감지되었습니다.'); window.location.href = '/dora-web/'</script>";
//            header('HTTP/1.1 301 Moved Permanently');
//            header('Location: https://azure.mandora.xyz/dora-web/');
            exit;
        }

        $query = "INSERT INTO `users` (user_id, nickname, password, email) VALUES ('".$_POST["user_id"]."', '".$_POST["nickname"]."', PASSWORD('".$_POST["password"]."'), '".$_POST["email"]."')";
        if (!mysqli_query($_SESSION['link'], $query, MYSQLI_USE_RESULT)) {
            echo "<script>alert('".mysqli_error($_SESSION['link'])."')</script>";
            exit;
        }
        unset($query);
        mysqli_close($_SESSION['link']);

        echo "<script>alert('회원가입이 완료되었습니다.'); window.location.href = '/dora-web/'</script>";
//        header('HTTP/1.1 301 Moved Permanently');
//        header('Location: https://azure.mandora.xyz/dora-web/');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - dora</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>
<?php include("nav.php"); ?>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">회원가입</h2>
                <p>일부 서비스는 회원가입 후 이용 가능합니다.</p>
            </div>
            <form id="JoinForm" method="post" action="join">
                <div class="form-group"><label for="username">아이디</label><input class="form-control item" type="text" id="username" name="user_id"><label id="verify_user_id"></label></div>
                <div class="form-group"><label for="password">비밀번호</label><input class="form-control item" type="password" id="password" name="password"><label id="verify_password"></label></div>
                <div class="form-group"><label for="password_confirm">비밀번호 확인</label><input class="form-control item" type="password" id="password_confirm" name="password_confirm"><label id="verify_password_confirm"></label></div>
                <div class="form-group"><label for="nick">닉네임</label><input class="form-control item" type="text" id="nick" name="nickname"><label id="verify_nickname"></label></div>
                <div class="form-group"><label for="email">E-mail</label><input class="form-control item" type="email" id="email" name="email"><label id="verify_email"></label></div>
                <button class="btn btn-success btn-block" type="button" onclick="verify_data('submit')">회원가입</button>
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
<script src="assets/js/member.js"></script>
</body>

</html>