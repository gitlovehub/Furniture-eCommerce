/*=============== Change type password ===============*/ 
const eyeOpenList = document.querySelectorAll('.eye-open');
const eyeCloseList = document.querySelectorAll('.eye-close');
const passwordInputList = document.querySelectorAll('.password');

eyeOpenList.forEach((eyeOpen, index) => {
    eyeOpen.addEventListener('click', () => {
        eyeOpen.style.display = 'none';
        eyeCloseList[index].style.display = 'block';
        passwordInputList[index].type = 'password';
    });
});

eyeCloseList.forEach((eyeClose, index) => {
    eyeClose.addEventListener('click', () => {
        eyeOpenList[index].style.display = 'block';
        eyeClose.style.display = 'none';
        passwordInputList[index].type = 'text';
    });
});

function toggleForms() {
    // Lấy các phần tử cần thao tác
    const btnForgot = document.querySelector('.btnForgot');
    const formLogin = document.querySelector('.form-container:not(.hide-form)');
    const formForgot = document.querySelector('.form-container.hide-form');

    // Kiểm tra xem các phần tử đã được tìm thấy chưa
    if (btnForgot && formLogin && formForgot) {
        // Xử lý khi click vào nút "forgot password"
        btnForgot.onclick = function(event) {
            event.preventDefault();
            // Hiển thị form forgot password và ẩn form login
            formLogin.classList.add('hide-form');
            formForgot.classList.remove('hide-form');
        };

        // Xử lý khi click vào nút "back to login"
        const backtoLogin = document.querySelector('.btnBackToLogin');
        if (backtoLogin) {
            backtoLogin.onclick = function(event) {
                event.preventDefault();
                // Hiển thị form login và ẩn form forgot
                formLogin.classList.remove('hide-form');
                formForgot.classList.add('hide-form');
            };
        }
    }
}

// Gọi hàm khi DOM đã được tải hoàn toàn
document.addEventListener("DOMContentLoaded", toggleForms);