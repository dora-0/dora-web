<?php
    session_start();
?>
<?php if (isset($parent)): ?>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">dora</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                 id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/home/site/wwwroot/index.php") echo "active"; ?>" href="index">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/home/site/wwwroot/about.php") echo "active"; ?>" href="about">Features</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/home/site/wwwroot/blog-post-list.php") echo "active"; ?>" href="blog-post-list">Blog</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/home/site/wwwroot/chat.php") echo "active"; ?>" href="chat">Chat</a></li>
                    <?php if (isset($_SESSION["user_id"])): ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout">Logout</a></li>
                    <?php else: ?>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/home/site/wwwroot/login.php") echo "active"; ?>" href="login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
