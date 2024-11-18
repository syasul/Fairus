function openVideoModal() {
    // Menampilkan modal
    const modal = document.getElementById('videoModal');
    modal.classList.remove('hidden');

    // Memulai video
    const video = document.getElementById('modalVideo');
    video.play();
}

function closeVideoModal() {
    // Menyembunyikan modal
    const modal = document.getElementById('videoModal');
    modal.classList.add('hidden');

    // Menghentikan video
    const video = document.getElementById('modalVideo');
    video.pause();
    video.currentTime = 0; // Reset waktu video ke awal
}