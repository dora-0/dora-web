<?php $parent = __FILE__; ?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - dora</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="chat.css">
</head>

<body>
<?php include("nav.php"); ?>
<main class="page landing-page">
    <section class="clean-block features">
        <ul class="pages">
            <li class="chat page">
                <div class="chatArea">
                    <ul class="messages"></ul>
                </div>
                <input class="inputMessage" placeholder="여기에 입력 ..."/>
            </li>
            <li class="login page">
                <div class="form">
                    <h3 class="title">닉네임을 입력하세요.</h3>
                    <input class="usernameInput" type="text" maxlength="14" />
                </div>
            </li>
        </ul>

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://mandora.xyz:3001/socket.io/socket.io.js"></script>
        <script src="https://mandora.xyz:3001/public/main.js"></script>
    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>