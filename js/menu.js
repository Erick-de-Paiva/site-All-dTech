document.addEventListener('click', function(event) {
    const menu = document.getElementById('menuHamburguer');
    const details = menu.querySelector('details');

    if (details.hasAttribute('open') && !menu.contains(event.target)) {
        details.removeAttribute('open');
    }
});
