<?php
session_start();
?>
<?php $parent = basename(__FILE__); ?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - dora</title>
    <?php include("vendor-css.php"); ?>
</head>

<body>
<?php include("nav.php"); ?>
<main class="page landing-page">
    <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/main-page.jpg&quot;);color: rgba(0,0,0, 0.75);">
        <div class="text">
            <h2>실시간 채팅</h2>
            <?php if (!isset($_SESSION["user_id"])): ?>
                <p>Simple Live-Chat Service</p><button class="btn btn-outline-light btn-lg" type="button" onclick="window.location.href = 'login'">Join Now</button>
            <?php else: ?>
                <p>Simple Live-Chat Service</p><button class="btn btn-outline-light btn-lg" type="button" onclick="window.location.href = 'chat'">Start Now</button>
            <?php endif; ?>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">Info</h2>
                <p>라이브 채팅 서비스</p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6"><img class="img-thumbnail" src="assets/img/preview-3.png"></div>
                <div class="col-md-6">
                    <h3>언제 어디서나 자유롭게</h3>
                    <?php if (!isset($_SESSION["user_id"])): ?>
                        <div class="getting-started-info">
                            <p>채팅 서비스를 이용할 수 있습니다.<br/>회원이 되시면 고정 닉네임을 사용하실 수 있습니다.</p>
                        </div>
                        <button class="btn btn-outline-success btn-lg" type="button" onclick="window.location.href = 'login'">Join Now</button>
                    <?php else: ?>
                        <div class="getting-started-info">
                            <p>채팅 서비스를 이용할 수 있습니다.</p>
                        </div>
                        <button class="btn btn-outline-success btn-lg" type="button" onclick="window.location.href = 'chat'">Start Now</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block features">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">Features</h2>
                <p>기능을 소개합니다.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                    <h4>Bootstrap 4</h4>
                    <p>이 페이지는 Bootstrap으로 만들어졌습니다.</p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                    <h4>Live Chat</h4>
                    <p>끊김없는 실시간 채팅 서비스를 사용할 수 있습니다.</p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                    <h4>Responsive</h4>
                    <p>반응형 웹 디자인을 제공합니다.</p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                    <h4>All Browser Compatibility</h4>
                    <p>모든 브라우저에서 호환 가능합니다.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-success">Screenshot</h2>
                <p>스크린샷을 볼 수 있습니다.</p>
            </div>
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/preview-1.png" alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/preview-2.png" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                                                                                                                                                                                                     data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                </ol>
            </div>
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