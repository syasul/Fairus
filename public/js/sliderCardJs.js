document.addEventListener('DOMContentLoaded', function () {
    const scrollContainers = document.querySelectorAll('.scroll-container');
    const scrollContents = document.querySelectorAll('.scroll-content');

    scrollContainers.forEach((container, index) => {
        const content = scrollContents[index];

        // Clone the content to create seamless scroll
        const clone = content.cloneNode(true);
        content.appendChild(clone);

        let scrollAmount = 0;
        let speed = 2; // Adjust speed for smoothness

        function autoScroll() {
            scrollAmount += speed;
            if (scrollAmount >= content.scrollWidth / 2) {
                // Reset to the start point without animation
                scrollAmount = 0;
            }

            container.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });

            requestAnimationFrame(autoScroll);
        }

        // Start smooth scrolling animation
        requestAnimationFrame(autoScroll);
    });
});
