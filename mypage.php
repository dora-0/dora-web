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
<main class="page landing-page">
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id ornare libero. Vivamus iaculis, justo vel mattis pharetra, nisi ligula varius nisl, sit amet mollis tortor ligula vitae nisi.</p>
                    </div>
                    <div class="tab-pane fade" id="cancel-user">
                        <p>Nunc vitae turpis id nibh sodales commodo et non augue. Proin fringilla ex nunc. Integer tincidunt risus ut facilisis tristique.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
<?php include("footer.php"); ?>
</body>
</html>