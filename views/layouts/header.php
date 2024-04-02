<?php
// Một mảng chứa các session bạn muốn hiển thị toast
$toastSessions = [
    "login-success"     => "Success",
    "addtocart-success" => "Success",
    "login-blocked"     => "Error",
    "login-unverified"  => "Error",
    "send-failed"       => "Error",
    "missing-color"     => "Error",
];

// Duyệt qua mảng session và hiển thị toast nếu session tồn tại
foreach ($toastSessions as $sessionKey => $toastType) {
    if (!empty($_SESSION[$sessionKey])) {
        echo '<script>
                  document.addEventListener("DOMContentLoaded", function() {
                    showToast("' . $toastType . '", "' . $_SESSION[$sessionKey] . '");
                  });
              </script>';
        unset($_SESSION[$sessionKey]); // Xóa session sau khi hiển thị
    }
}
?>

<header class="header">
    <div class="grid wide">
        <div class="header__navbar header-sticky">
            <div class="header__navbar-mobile hide-on-pc hide-on-tablet">
                <div class="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24" fill="none">
                        <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <?php if (isset($_SESSION["user"])) : ?>
                    <button class="header__navbar-menu-link header__navbar-icon-btn user-icon">
                        <svg width="1.6em" height="1.6em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2" />
                            <path d="M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z" stroke="#323232" stroke-width="2" />
                            <path d="M6.16406 18.5C6.90074 16.5912 8.56373 16 12.0001 16C15.4661 16 17.128 16.5578 17.855 18.5" stroke="#323232" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                <?php endif; ?>
            </div>

            <a href="?act=home-page" class="header__navbar-logo">
                <img src="<?= BASE_URL ?>assets/images/logo.png" alt="" class="header__navbar-logo-img">
            </a>

            <div class="header__navbar-menu hide-on-mobile">
                <a href="?act=categories" class="header__navbar-menu-link">
                    Categories
                </a>
                <?php if (empty($_SESSION["user"])) : ?>
                    <a href="?act=register" class="header__navbar-menu-link">
                        Register
                    </a>
                    <a href="?act=login" class="header__navbar-menu-link">
                        Login
                    </a>
                <?php endif; ?>
                <button class="header__navbar-menu-link header__navbar-icon-btn search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="1.6em" height="1.6em" viewBox="0 0 32 32" version="1.1">
                        <title>search</title>
                        <path d="M16.906 20.188l5.5 5.5-2.25 2.281-5.75-5.781c-1.406 0.781-3.031 1.219-4.719 1.219-5.344 0-9.688-4.344-9.688-9.688s4.344-9.688 9.688-9.688 9.719 4.344 9.719 9.688c0 2.5-0.969 4.781-2.5 6.469zM3.219 13.719c0 3.594 2.875 6.469 6.469 6.469s6.469-2.875 6.469-6.469-2.875-6.469-6.469-6.469-6.469 2.875-6.469 6.469z" />
                    </svg>
                </button>

                <button class="header__navbar-menu-link header__navbar-icon-btn cart-icon" data-item-count="7">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.6em" width="1.6em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                            </path>
                        </g>
                    </svg>
                </button>

                <?php if (isset($_SESSION["user"])) : ?>
                    <div class="header__navbar-dropdown position-relative">
                        <button class="header__navbar-menu-link header__navbar-icon-btn user-icon">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2" />
                                <path d="M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z" stroke="#323232" stroke-width="2" />
                                <path d="M6.16406 18.5C6.90074 16.5912 8.56373 16 12.0001 16C15.4661 16 17.128 16.5578 17.855 18.5" stroke="#323232" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </button>
                        <ul class="header__navbar-submenu list-group position-absolute bg-light end-0 shadow-lg" style="width: 200px;">
                            <a class="list-group-item list-group-item-action ps-5 p-4 border-bottom-0" href="?act=settings">
                                <i class="fa-solid fa-gears me-3"></i>
                                Settings
                            </a>
                            <a class="list-group-item list-group-item-action ps-5 p-4" href="?act=purchased">
                                <i class="fa-regular fa-credit-card me-3"></i>
                                Purchased
                            </a>
                            <a class="list-group-item list-group-item-action ps-5 p-4" href="?act=logout">
                                <i class="fa-solid fa-power-off me-3"></i>
                                Log Out
                            </a>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="header__navbar-mobile hide-on-pc hide-on-tablet">
                <button class="header__navbar-menu-link header__navbar-icon-btn search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="1.6em" height="1.6em" viewBox="0 0 32 32" version="1.1">
                        <title>search</title>
                        <path d="M16.906 20.188l5.5 5.5-2.25 2.281-5.75-5.781c-1.406 0.781-3.031 1.219-4.719 1.219-5.344 0-9.688-4.344-9.688-9.688s4.344-9.688 9.688-9.688 9.719 4.344 9.719 9.688c0 2.5-0.969 4.781-2.5 6.469zM3.219 13.719c0 3.594 2.875 6.469 6.469 6.469s6.469-2.875 6.469-6.469-2.875-6.469-6.469-6.469-6.469 2.875-6.469 6.469z" />
                    </svg>
                </button>

                <button class="header__navbar-menu-link header__navbar-icon-btn cart-icon" data-item-count="7">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.6em" width="1.6em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                            </path>
                        </g>
                    </svg>
                </button>

                <nav class="navbar__mobile">
                    <div class="navbar__mobile-close-btn">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.1em" width="1.1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 0 0 203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z">
                            </path>
                        </svg>
                    </div>
                    <ul class="navbar__mobile-list">
                        <li class="navbar__mobile-item">
                            <a href="?act=categories" class="navbar__mobile-item-link">
                                <span>[</span>
                                <span>All</span>
                                <span>]</span>
                            </a>
                        </li>
                        <?php $listCategory = getStatusActive('tbl_categories'); ?>
                        <?php foreach ($listCategory as $category) : ?>
                            <li class="navbar__mobile-item">
                                <a href="?act=category-menu&id=<?= $category['id'] ?>" class="navbar__mobile-item-link">
                                    <span>[</span>
                                    <span class="text-uppercase"><?= $category['name'] ?></span>
                                    <span>]</span>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <?php if (empty($_SESSION["user"])) : ?>
                            <li class="navbar__mobile-item">
                                <a href="?act=login" class="navbar__mobile-item-link">
                                    <span>[</span>
                                    <span>Login</span>
                                    <span>]</span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="navbar__mobile-item">
                                <a href="?act=settings" class="navbar__mobile-item-link">
                                    <span>[</span>
                                    <span>Account</span>
                                    <span>]</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>