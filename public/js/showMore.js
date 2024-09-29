document.getElementById('show-more').addEventListener('click', function () {
    // Find all hidden images
    const hiddenImages = document.querySelectorAll('.break-inside-avoid.hidden');

    // Show the hidden images
    hiddenImages.forEach(function (image) {
        image.classList.remove('hidden');
    });

    // Optionally, hide the "Lihat Semua" button after all images are shown
    this.style.display = 'none';
});
