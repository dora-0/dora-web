<?php
session_start();
?>
<?php $parent = basename(__FILE__); ?>

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
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#modify-user">회원정보 수정</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cancel-user">회원탈퇴</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="modify-user">
                            <div class="block-heading">
                                <h2 class="text-success">내 정보 관리</h2>
                                <p>등록된 정보를 관리할 수 있습니다.</p>
                            </div>
                            <form id="mypageForm" method="post" action="mypage">
                                <?php if (isset($_GET["redirect_url"])): ?>
                                    <input type='hidden' name='redirect_url' value='<?=$_GET["redirect_url"]?>' />
                                <?php elseif (isset($_POST["redirect_url"])): ?>
                                    <input type='hidden' name='redirect_url' value='<?=$_POST["redirect_url"]?>' />
                                <?php endif; ?>
                                <div class="form-group"><label for="username">아이디</label><input class="form-control item" type="text" id="username" name="user_id"><label id="verify_user_id"></label></div>
                                <div class="form-group"><label for="password">비밀번호</label><input class="form-control" type="password" id="password" name="password"><label id="verify_password"></label></div>
                                <!--                <div class="form-group">-->
                                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">자동 로그인</label></div>-->
                                <!--                </div>-->
                                <button class="btn btn-success btn-block" type="submit">수정 완료</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="cancel-user">
                            <p>Nunc vitae turpis id nibh sodales commodo et non augue. Proin fringilla ex nunc. Integer tincidunt risus ut facilisis tristique.</p>
                        </div>
                    </div>
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
<?php include("footer.php"); ?>
</body>
</html>