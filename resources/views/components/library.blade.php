<div id="library-wrapper">
    <div class="slider-wrapper">
        <input type="radio" name="options" value="albums" id="albums-input"/>
        <label id="albums-input-label" for="albums-input"><h5>Albums</h5></label>
        <input type="radio" name="options" value="artists" id="artists-input"/>
        <label id="artists-input-label" for="artists-input"><h5>Artists</h5></label>
        <div id="slider"></div>
    </div>
    <div id="playlist-library">
        <div id="library-slider">
            <div class="library-section">
                @foreach($albums as $album)
                    <a class="library-item" href="{{ route('view-album', ['album_name' => $album->album_name]) }}">
                        <img src="{{ Storage::disk('azure')->url($album->album_cover) }}" alt="{{ $album->album_title }}" class="album-cover">
                        <div class="album-metadata">
                            <h3 class="album-title">{{ $album->album_name }}</h3>
                            <h4 class="album-artist">{{ $album->user->username }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="library-section">
                @foreach($artists as $artist)
                    <a class="library-item" href="{{ route('view-artist', ['username' => $artist->username]) }}">
                        <img class="library-image" src="{{ Storage::disk('azure')->url($artist->profile_picture) }}" alt="{{ $artist->username }}" class="album-cover">
                        <h3 class="artist-name album-artist">{{ $artist->username }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
