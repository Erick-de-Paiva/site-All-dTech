const themeBtn = document.getElementById("toggleTheme");

themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");

    if (document.body.classList.contains("light-mode")) {
        themeBtn.textContent = "🌙";
    } else {
        themeBtn.textContent = "🌞";
    }

    const logo = document.getElementById("logo");
    const loginIcon = document.getElementById("loginIcon"); 

    if (document.body.classList.contains("light-mode")) {
        if (logo) logo.src = "img/logo-preto.png";
        if (loginIcon) loginIcon.src = "img/login-preto.png";
    } else {
        if (logo) logo.src = "img/logo-branca.png";
        if (loginIcon) loginIcon.src = "img/login-branco.png";
    }

});
const fontBtn = document.getElementById("fontBtn");

let zoomSteps = [1, 1.15, 1.30]; 
let currentZoomIndex = 0;

fontBtn.addEventListener("click", () => {
    
    currentZoomIndex++;

    if (currentZoomIndex >= zoomSteps.length) {
        currentZoomIndex = 0;
    }

    document.body.style.zoom = zoomSteps[currentZoomIndex];

    if (currentZoomIndex === 0) {
        fontBtn.textContent = "🔍"; 
    } else {
        fontBtn.textContent = "🔎"; 
    }
});