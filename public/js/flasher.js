setTimeout(function () {
    var flasherMessage = document.getElementById('flasher-message');
    if (flasherMessage) {
        flasherMessage.remove(); // Menghapus elemen secara langsung
    }
}, 3000);
