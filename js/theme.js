document.addEventListener("DOMContentLoaded", () => {
    const themeBtn = document.getElementById("toggleTheme");
    const fontBtn = document.getElementById("fontBtn");
    const body = document.body;
    const logo = document.getElementById("logo");
    const loginIcon = document.getElementById("loginIcon"); 

    if (localStorage.getItem("theme") === "light") {
        body.classList.add("light-mode");
        if (themeBtn) themeBtn.textContent = "🌙";
        if (logo) logo.src = "img/logo-preto.png";
        if (loginIcon) loginIcon.src = "img/login-preto.png";
    }

    if (themeBtn) {
        themeBtn.addEventListener("click", () => {
            body.classList.toggle("light-mode");

            const logo = document.getElementById("logo");
            const loginIcon = document.getElementById("loginIcon"); 

            if (body.classList.contains("light-mode")) {
                localStorage.setItem("theme", "light");
                themeBtn.textContent = "🌙";
                
                if (logo) logo.src = "img/logo-preto.png";
                
                if (loginIcon) loginIcon.src = "img/login-preto.png";
            } else {
                localStorage.setItem("theme", "dark");
                themeBtn.textContent = "☀️";
                
                if (logo) logo.src = "img/logo-branca.png";
                if (loginIcon) loginIcon.src = "img/login-branco.png";
            }
        });
    }

    if (fontBtn) {
        let zoomSteps = [1, 1.15, 1.30]; 
        let currentZoomIndex = 0;
        const fontScale = document.getElementById("fontScale");

        fontBtn.addEventListener("click", () => {
            currentZoomIndex++;

            if (currentZoomIndex >= zoomSteps.length) {
                currentZoomIndex = 0;
            }

            body.style.zoom = zoomSteps[currentZoomIndex];

            if (fontScale) {
                if (currentZoomIndex === 0) {
                    fontScale.textContent = "(1x)"; 
                } else if (currentZoomIndex === 1) {
                    fontScale.textContent = "(1.15x)"; 
                } else {
                    fontScale.textContent = "(1.3x)"; 
                }
            }
        });
    }
});
