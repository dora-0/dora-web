<?php if (isset($parent)): ?>
    <?php
        $filename = str_replace(".php", "", $parent);
        $redirect_url = "?redirect_url=/".$filename;
    ?>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/">dora</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                 id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "index.php") echo "active"; ?>" href="/">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "chat.php") echo "active"; ?>" href="chat">Chat</a></li>
                    <?php if (isset($_SESSION["user_id"])): ?>
                        <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "mypage.php") echo "active"; ?>" href="mypage<?=$redirect_url?>">Mypage</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="logout<?=$redirect_url?>">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "login.php") echo "active"; ?>" href="login<?=$redirect_url?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
