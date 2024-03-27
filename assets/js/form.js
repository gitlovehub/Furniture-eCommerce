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