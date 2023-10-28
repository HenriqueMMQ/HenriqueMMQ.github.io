<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'index')) {
    ?>

    <nav id="sidebarMenu" class="collapse d-lg-block sidebar">
        <div class="p-1">
            <div class="text-light h5  list-group-flush mx-3 mt-4">
                <a href="index.php#first_sec" onclick="load_google_news()"
                    class="text-light h5 list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-newspaper fa-fw me-3"></i><span>Google News</span></a>
                <a href="index.php#first_sec" onclick="load_zdnet_news()"
                    class="text-light h5 list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-newspaper fa-fw me-3"></i><span>ZD Net News</span></a>
                <?php if (empty($_SESSION['email'])) { ?>
                    <a href="login.php" class="text-light h5 list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-solid fa-sign-in-alt"></i><span> Login</span>
                    <?php } ?>
                    <?php if (!empty($_SESSION['email'])) { ?>
                        <a href="profile.php" class="text-light h5 list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-user"></i> Perfil</a>
                    <?php } ?>
            </div>
    </nav>

    <?php
} else {
    if (empty($_SESSION['email'])) { ?>

        <nav id="sidebarMenu" class="collapse d-lg-block sidebar bg-white">
            <div>
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-solid fa-house-user"></i><span> Home</span></a>
                    <a href="index.php#first_sec" onclick="load_google_news()"
                        class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-newspaper fa-fw me-3"></i><span>Google News</span></a>
                    <a href="index.php#first_sec" onclick="load_zdnet_news()"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-newspaper fa-fw me-3"></i><span>ZD Net News</span></a>
                    <?php if (empty($_SESSION['email'])) { ?>
                        <a href="login.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-solid fa-sign-in-alt"></i><span> Login</span>
                        <?php } ?>
                        <?php if (!empty($_SESSION['email'])) { ?>
                            <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-user"></i> Perfil</a>
                        <?php } ?>
                </div>
        </nav>

        <?php
    } else {
        ?>
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a href="appointments.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        Consultas
                    </a>
                </li>
                <?php
                $user_admin = $_SESSION['user']['admin'];
                if ($user_admin == 1) {
                    ?>
                    <li>
                        <a href="portfolio.php" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                            </svg>
                            Portfólio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="news.php" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                            </svg>
                            Notícias
                        </a>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <a class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                        </svg>
                        <form method="POST">
                            <button name="logout" style="all: unset; padding-left: 30px; cursor: pointer;"> Logout</button>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    <?php }
}