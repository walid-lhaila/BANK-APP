const formclient = document.getElementById('formclient');
const card = document.getElementById('card');
card.addEventListener('click', (e) => {
    formclient.classList.remove("scale-0");
    formclient.classList.add("scale-150 ");
    
})