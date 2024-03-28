<header class="header">
    <div class="grid wide">
        <div class="header__navbar header-sticky">
            <a href="?act=home-page" class="header__navbar-logo">
                <img src="<?= BASE_URL ?>assets/images/logo.png" alt="" class="header__navbar-logo-img">
            </a>

            <div class="header__navbar-menu hide-on-mobile">
                <a href="?act=categories" class="header__navbar-menu-link">
                    CATEGORIES
                </a>
                <a href="register.html" class="header__navbar-menu-link">
                    REGISTER
                </a>
                <a href="?act=login" class="header__navbar-menu-link">
                    LOGIN
                </a>
                <button class="header__navbar-menu-link search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="1.2em" height="1.2em" viewBox="0 0 32 32" version="1.1">
                        <title>search</title>
                        <path d="M16.906 20.188l5.5 5.5-2.25 2.281-5.75-5.781c-1.406 0.781-3.031 1.219-4.719 1.219-5.344 0-9.688-4.344-9.688-9.688s4.344-9.688 9.688-9.688 9.719 4.344 9.719 9.688c0 2.5-0.969 4.781-2.5 6.469zM3.219 13.719c0 3.594 2.875 6.469 6.469 6.469s6.469-2.875 6.469-6.469-2.875-6.469-6.469-6.469-6.469 2.875-6.469 6.469z" />
                    </svg>
                </button>
                <button class="header__navbar-menu-link cart-icon has-cart" data-item-count="7">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                            </path>
                        </g>
                    </svg>
                </button>
            </div>

            <div class="header__navbar-mobile hide-on-pc hide-on-tablet">
                <button class="header__navbar-menu-link search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="1.2em" height="1.2em" viewBox="0 0 32 32" version="1.1">
                        <title>search</title>
                        <path d="M16.906 20.188l5.5 5.5-2.25 2.281-5.75-5.781c-1.406 0.781-3.031 1.219-4.719 1.219-5.344 0-9.688-4.344-9.688-9.688s4.344-9.688 9.688-9.688 9.719 4.344 9.719 9.688c0 2.5-0.969 4.781-2.5 6.469zM3.219 13.719c0 3.594 2.875 6.469 6.469 6.469s6.469-2.875 6.469-6.469-2.875-6.469-6.469-6.469-6.469 2.875-6.469 6.469z" />
                    </svg>
                </button>
                <button class="header__navbar-menu-link cart-icon has-cart" data-item-count="7">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                            </path>
                        </g>
                    </svg>
                </button>
                <div class="hamburger">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M3 4h18v2H3V4zm6 7h12v2H9v-2zm-6 7h18v2H3v-2z"></path>
                        </g>
                    </svg>
                </div>
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
                        <?php $listCategory = selectStatusActive('tbl_categories'); ?>
                        <?php foreach ($listCategory as $category) : ?>
                            <li class="navbar__mobile-item">
                                <a href="?act=category-filter&id=<?= $category['id'] ?>" class="navbar__mobile-item-link">
                                    <span>[</span>
                                    <span class="text-uppercase"><?= $category['name'] ?></span>
                                    <span>]</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li class="navbar__mobile-item">
                            <a href="?act=login" class="navbar__mobile-item-link">
                                <span>[</span>
                                <span>ACCOUNT</span>
                                <span>]</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>