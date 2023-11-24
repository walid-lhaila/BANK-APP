const formaccount = document.getElementById('formaccount');
const cardaccount = document.getElementById('cardaccount');
cardaccount.addEventListener('click', (e) => {
    formaccount.classList.remove("scale-0");
    formaccount.classList.add("scale-150 ");
    
})
