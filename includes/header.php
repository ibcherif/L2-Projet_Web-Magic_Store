
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="nav-content">
            <a class="navbar-brand" href="index.php">
                <div style="width: 0.5em"></div>
                <h1>Magic Store</h1>
            </a>
            <?php if(!empty($_SESSION['login'])):?>
                <a class="btn btn-dark" role="button" href="shop.php">
                   Shope
                </a>
            <?php else:?>
                <a class="btn btn-dark" role="button" href="browse.php">
                    Browse
                </a>
            <?php endif?>
            <div style="flex:1"></div>
            <div class="btn-group" role="group">
                <?php if(!empty($_SESSION['login'])):?>
                    <div class="dropdown">
                        <a class="btn btn-dark" role="button" href="cart.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
                            </svg>
                        </a>
                        <button class="btn btn-dark  dropdown-toggle" role="button" data-bs-toggle="dropdown"><?=$_SESSION['login'] ?><span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </div>
                    </div>
                <?php else:?>
                    <a class="btn btn-dark" role="button" href="login.php">
                        Login
                    </a>
                <?php endif?>
            </div>
        </div>
    </nav>
</header>