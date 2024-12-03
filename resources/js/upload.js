if (window.location.pathname === '/upload') {
    document.getElementById('album-cover-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('album-cover-preview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "flex";
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    });

    const songInput = document.getElementById('upload-tracks-input');
    const trackContainer = document.getElementById('track-form');

    songInput.addEventListener('change', function (event) {
        const files = event.target.files;
        trackContainer.innerHTML = '';

        Array.from(files).forEach((file, index) => {
            const fileName = file.name;
            const fileType = fileName.split('.').pop().toLowerCase();

            const audio = new Audio();
            const fileURL = URL.createObjectURL(file);

            audio.src = fileURL;

            const trackHTML = `
                <div class="track">
                    <button class="track-number">
                        <h4 class="track-index">${index + 1}</h4>
                        <i class="fa-solid fa-play play-track"></i>
                    </button>
                    <input type="text" name="song-titles[]" class="song-title-input" placeholder="Song title...">
                    <h4 class="track-filetype">.${fileType}</h4>
                    <h4 class="track-filename">${fileName}</h4>
                    <h4 class="track-length" id="track-length-${index}">Calculating...</h4>
                </div>
            `;

            trackContainer.insertAdjacentHTML('beforeend', trackHTML);

            audio.addEventListener('loadedmetadata', function () {
                const trackLength = formatTime(audio.duration);

                const trackLengthElement = document.getElementById(`track-length-${index}`);
                if (trackLengthElement) {
                    trackLengthElement.textContent = trackLength;
                }
                
                URL.revokeObjectURL(fileURL);
            });
        });
    });

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
    }
}