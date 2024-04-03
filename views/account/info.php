<section id="intro">
    <div class="grid wide pt-5">
        <div class="d-flex align-items-center" style="line-height: 18px;">
            <i class="fa-solid fa-angle-left fs-3"></i>
            <span onclick="goHome()" class="header__navbar-menu-link fs-3">Home</span>
        </div>

        <h1 class="text-uppercase text-center mt-3 pt-5">
            Account Details
        </h1>
        <div class="account-container">
            <aside class="account__navigation">
                <a href="?act=setting-info" class="account__navigation-link active">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Account Details</span>
                </a>
                <a href="" class="account__navigation-link">
                    <i class="fa-solid fa-dolly"></i>
                    <span>Order History</span>
                </a>
                <a href="setting-password" class="account__navigation-link">
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
            <form action="" class="row w-100 d-flex flex-sm-row flex-column-reverse pt-4" method="post" enctype="multipart/form-data">
                <div class="col-12 col-sm-8">
                    <div class="form__group">
                        <label class="fw-semibold" for="username">Username</label>
                        <input type="username" id="username" name="username">
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="address">Address</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="form__group">
                        <h4 class="fw-semibold">Registration Date:
                            <span class="fw-bold">30/02/2024</span>
                        </h4>
                    </div>
                    <div class="form__group">
                        <h4 class="fw-semibold">Status:
                            <span class="fw-semibold rounded px-2 py-1 text-bg-success">Active</span>
                        </h4>
                    </div>
                    <button type="button" name="btnSaveInfo" class="btn btn-danger fs-3 fw-semibold w-100 mt-5">
                        <i class="fa-regular fa-floppy-disk me-2"></i>
                        Save
                    </button>
                </div>

                <div class="col-12 col-sm-4 mb-5">
                    <div class="col-12 m-auto mb-5 text-center">
                        <div class="avt m-auto" style="width: 150px; height: 150px;">
                            <img src="https://images.unsplash.com/placeholder-avatars/extra-large.jpg?bg=fff&crop=faces&dpr=1&h=150&w=150&auto=format&fit=crop&q=60&ixlib=rb-4.0.3" class="avt-img rounded-circle h-100" style="object-fit: cover;" alt="default">
                        </div>
                        <label for="upload" class="btn btn-outline-secondary fs-4 mt-4"><i class="fa-regular fa-image me-2"></i>Choose image</label>
                        <input type="file" id="upload" hidden>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>