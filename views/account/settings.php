<section id="intro">
    <div class="grid wide pt-5">
        <div class="d-flex align-items-center" style="line-height: 18px;">
            <i class="fa-solid fa-angle-left fs-3"></i>
            <span onclick="goBack()" class="header__navbar-menu-link fs-3">Back</span>
        </div>

        <?php if (isset($_SESSION["user"])) {
            $customer = $_SESSION["user"];
        } ?>

        <div class="account-container">
            <aside class="account__navigation">
                <a href="?act=setting-info&id=<?= $customer['id'] ?>" class="account__navigation-link">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Account Details</span>
                </a>
                <a href="?act=order-history&id=<?= $customer['id'] ?>" class="account__navigation-link">
                    <i class="fa-solid fa-dolly"></i>
                    <span>Order History</span>
                </a>
                <a href="?act=forgot-password" class="account__navigation-link">
                    <i class="fa-solid fa-key"></i>
                    <span>Password</span>
                </a>
                <a href="?act=logout" class="account__navigation-link">
                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.68113 10.86H6.70132V2.91386H9.68113V4.99972H10.9393V2.26824C10.9393 1.93715 10.6744 1.67228 10.3433 1.67228H6.70132V0.430692C6.70132 0.116157 6.38679 -0.0824967 6.10536 0.0333846L1.05625 2.30135C0.774825 2.43378 0.576172 2.71521 0.576172 3.02974V10.7607C0.576172 11.0752 0.758271 11.3566 1.05625 11.4891L6.10536 13.757C6.38679 13.8895 6.70132 13.6743 6.70132 13.3597V12.1181H10.3433C10.6744 12.1181 10.9393 11.8533 10.9393 11.5222V8.77414H9.68113V10.86Z" fill="black"></path>
                        <path d="M16.1542 6.57244L13.1413 4.12238C12.8764 3.90717 12.4626 4.08927 12.4626 4.45347V5.8606H7.89354C7.69489 5.8606 7.5459 6.02614 7.5459 6.20824V7.59882C7.5459 7.79747 7.71144 7.94646 7.89354 7.94646H12.4626V9.35359C12.4626 9.70123 12.8764 9.89989 13.1413 9.68468L16.1542 7.21806C16.3529 7.05252 16.3529 6.73798 16.1542 6.57244Z" fill="black"></path>
                    </svg>
                    <span>Log Out</span>
                </a>
            </aside>
            <div class="account__header">
                <h1 class="account__header-title text-center text-md-start">
                    Hi,
                    <label>
                        <?= $customer['name'] ?>
                    </label>
                </h1>
                <p class="account__header-text">
                    From your account dashboard you can manage your
                    <a href="?act=setting-info&id=<?= $customer['id'] ?>">shipping and billing addresses</a>, and
                    <a href="?act=forgot-password">edit your password.</a>
                </p>
            </div>
        </div>
    </div>
</section>