<?php if (isset($parent)): ?>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">dora</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                 id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/var/www/html/public/dora-web/index.php") echo "active"; ?>" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/var/www/html/public/dora-web/about.php") echo "active"; ?>" href="about.php">Features</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/var/www/html/public/dora-web/blog-post-list.php") echo "active"; ?>" href="blog-post-list.php">Blog</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/var/www/html/public/dora-web/chat.php") echo "active"; ?>" href="chat.php">Chat</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if ($parent === "/var/www/html/public/dora-web/login.php") echo "active"; ?>" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
