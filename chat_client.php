<?php if (isset($parent)): ?>
    <link rel="stylesheet" href="assets/css/chat.css">
    <ul class="pages">
        <li class="chat page">
            <div class="chatArea">
                <ul class="messages"></ul>
            </div>
            <input class="inputMessage" placeholder="여기에 입력..."/>
        </li>
        <li id="login-section" class="login page">
            <div class="form">
                <?php if (isset($_SESSION["nickname"])): ?>
                <h3 class="title">환영합니다, <?=$_SESSION["nickname"]?>님!<br/>Enter 키를 눌러 채널에 입장하세요.</h3>
                <input class="usernameInput" type="hidden" value="<?=$_SESSION["nickname"]?>" />
                <?php else: ?>
                <h3 class="title">닉네임을 입력하세요.</h3>
                <input class="usernameInput" type="text" maxlength="14" />
                <?php endif; ?>
            </div>
        </li>
        <li id="load-section" class="load page">
            <div id="notify-section" class="section">
                <img alt='연결 중' style='max-width: 128px' src='assets/img/antenna.png' />
                <h3 class="title">서버에 연결하는 중...</h3>
            </div>
        </li>
    </ul>
    <script>
        function init_login() {
            $("#login-section").css('display', 'block');
            $("#load-section").css('display', 'none');
        }

        function load_error() {
            $("#notify-section").html("<img alt='연결 실패' style='max-width: 128px' src='assets/img/broken-link.png' /><br/><h3 class='title'>연결에 실패했습니다.</h3>");
        }
    </script>
    <script src="https://chat.mandora.xyz/socket.io/socket.io.js" onload="init_login()" onerror="load_error()"></script>
    <script src="https://chat.mandora.xyz/main.js"></script>
<?php endif; ?>