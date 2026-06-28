// Navbar shadow on scroll
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.querySelector('.navbar').style.boxShadow = "0 2px 10px rgba(0,0,0,0.1)";
    } else {
        document.querySelector('.navbar').style.boxShadow = "none";
    }
});