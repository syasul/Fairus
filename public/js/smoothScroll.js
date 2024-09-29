document.addEventListener("DOMContentLoaded", function () {
    const anchors = document.querySelectorAll('a[href^="#"]');

    anchors.forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // Sesuaikan angka ini dengan ukuran header atau margin
                    behavior: 'smooth'
                });
            }
        });
    });
});
