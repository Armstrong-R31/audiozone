document.addEventListener('DOMContentLoaded', () => {

    class MediaPlayer {
        constructor() {
            this.audio = document.getElementById('media-player');
            this.albumCover = document.getElementById('album-cover');
            this.trackTitle = document.getElementById('track-title');
            this.trackArtist = document.getElementById('track-artist');
        }
    
        loadSong(title, artist, cover, track) {
            this.audio.src = track;
            this.audio.load();
            this.albumCover.src = cover;
            this.trackTitle.innerHTML = title;
            this.trackArtist.innerHTML = artist;
            this.audio.play();
        }
    }

    const trackButtons = document.querySelectorAll('.track-number');
    const mediaPlayer = new MediaPlayer();

    trackButtons.forEach(button => {
        button.addEventListener('click', () => {
            const songTitle = button.getAttribute('data-song-title');
            const songArtist = button.getAttribute('data-song-artist');
            const songCover = button.getAttribute('data-song-cover');
            const songUrl = button.getAttribute('data-song-url');

            mediaPlayer.loadSong(songTitle, songArtist, songCover, songUrl);
        });
    });
});
