const initCarousel = () => {
    const cardList = document.querySelector(".carousel .card-list");
    const btnsCarousel = document.querySelectorAll(".carousel .btn-carousel");
    const maxScrollLeft = cardList.scrollWidth - cardList.clientWidth;

    // Gérer le défilement des cartes selon les boutons de navigation
    btnsCarousel.forEach(btn => {
        btn.addEventListener("click", () => {
            const direction = btn.id === "prev" ? -1 : 1;
            const scrollAmount = cardList.clientWidth * direction;
            cardList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    // Affiche ou masque les boutons selon la position de défilement
    const handleCarouselBtns = () => {
        btnsCarousel[0].style.display = cardList.scrollLeft <= 0 ? "none" : "flex";
        btnsCarousel[1].style.display = cardList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }

    // Appelle cette fonction lorsque la liste de cartes défile
    cardList.addEventListener("scroll", handleCarouselBtns);
}

window.addEventListener("resize", initCarousel);
window.addEventListener("load", initCarousel);
