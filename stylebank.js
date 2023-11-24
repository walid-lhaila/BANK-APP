const formbank = document.getElementById('formbank');
const cardbank = document.getElementById('cardbank');
cardbank.addEventListener('click', (e) => {
    formbank.classList.remove("scale-0");
    formbank.classList.add("scale-150 ");
    
})