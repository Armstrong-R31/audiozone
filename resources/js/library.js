document.addEventListener('DOMContentLoaded', function() {
    const artists = document.getElementById('artists-input-label');
    const albums = document.getElementById('albums-input-label');
    const librarySlider = document.getElementById('library-slider');

    artists.addEventListener('click', function() {
        librarySlider.style.left = '-100%';
    });

    albums.addEventListener('click', function() {
        librarySlider.style.left = '0';
    });
});
