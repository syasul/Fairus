document.addEventListener('DOMContentLoaded', function () {
    const scrollContainer = document.querySelector('.overflow-x-auto');
    const dots = document.querySelectorAll('.w-4.h-4');

    scrollContainer.addEventListener('scroll', function () {
        const scrollWidth = scrollContainer.scrollWidth - scrollContainer.clientWidth;
        const scrollLeft = scrollContainer.scrollLeft;
        const percentageScrolled = (scrollLeft / scrollWidth) * 100;
        const activeDotIndex = Math.round((percentageScrolled / 100) * (dots.length - 1));

        dots.forEach((dot, index) => {
            if (index === activeDotIndex) {
                dot.classList.add('bg-blue-500');
                dot.classList.remove('bg-gray-300');
            } else {
                dot.classList.add('bg-gray-300');
                dot.classList.remove('bg-blue-500');
            }
        });
    });
});
