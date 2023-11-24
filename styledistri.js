const formdistributeurs = document.getElementById('formdistributeurs');
const carddistributeurs = document.getElementById('carddistributeurs');
carddistributeurs.addEventListener('click', (e) => {
    formdistributeurs.classList.remove("scale-0");
    formdistributeurs.classList.add("scale-150 ");
    
})