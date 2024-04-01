const toastSuccess    = document.querySelector(".toast-success");
const toastError      = document.querySelector(".toast-error");
const progressSuccess = document.querySelector(".progress-success");
const progressError   = document.querySelector(".progress-error");
const toasts          = document.querySelectorAll(".toast-wrapper");
const closeToasts     = document.querySelectorAll(".toast-close");

function showToast(title, message) {
    // Lấy đối tượng toast dựa trên title
    const toastType = title.toLowerCase();

    // Hiển thị toast chỉ khi title là "success"
    if (toastType === "success") {
        toastSuccess.classList.add("appear");
        progressSuccess.classList.add("appear");
        document.querySelector(".message-success").innerText = message;
    }

    // Hiển thị toast chỉ khi title là "error"
    if (toastType === "error") {
        toastError.classList.add("appear");
        progressError.classList.add("appear");
        document.querySelector(".message-error").innerText = message;
    }

    // Đặt hẹn giờ để ẩn toast sau 5 giây
    timerToast = setTimeout(() => {
        toasts.forEach(toast => {
            toast.classList.remove("appear");
        });
    }, 5000);

    timerProgress = setTimeout(() => {
        const progressBars = document.querySelectorAll(".toast-progress");
        progressBars.forEach(progress => {
            progress.classList.remove("appear");
        });
    }, 5300);
}

closeToasts.forEach(closeToast => {
    closeToast.addEventListener("click", () => {
        // Xử lý sự kiện nhấp vào nút X
        toasts.forEach(toast => {
            toast.classList.remove("appear");
        });
        clearTimeout(timerToast);
        clearTimeout(timerProgress);
    });
});