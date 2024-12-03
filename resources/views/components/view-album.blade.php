@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="banner">
            <img src="{{ Storage::disk('azure')->url($album->album_cover) }}" alt="Album cover" class="banner-image">
            <div class="banner-data">
                <h1>{{ $album->album_name }}</h1>
                <a href="{{ route('view-artist', ['user_id', $album->user->user_id]) }}"><h3>{{ $album->user->username }}</h3></a>
            </div>
        </div>
        <div class="playlist-options">
            <button class="play-button">
                <i class="fa-solid fa-circle-play"></i>
            </button>
        </div>
        <div class="headings">
            <h3 class="track-number-heading">#</h3>
            <h3 class="track-title-heading">Title</h3>
            <h3 class="track-plays-heading">Plays</h3>
            <h3 class="track-length-heading">Length</h3>
        </div>
        <div class="track-container">
            @foreach($album->tracks as $index => $track)
                <div class="track">
                    <button class="track-number" data-song-title="{{ $track->title }}" data-song-artist="{{ $track->album->user->username }}" data-song-cover="{{ Storage::disk('azure')->url($album->album_cover) }}" data-song-url="{{ Storage::disk('azure')->url($track->file_url) }}">
                        <h4 class="track-index">{{ $index + 1 }}</h4> 
                        <i class="fa-solid fa-play play-track"></i>
                    </button>
                    <div class="track-data">
                        <h4 class="track-title">{{ $track->title }}</h4>
                        <a href="{{ route('view-artist', $track->album->user->username) }}" class="track-artist">{{ $track->album->user->username }}</a>
                    </div>
                    <h4 class="track-plays">{{ number_format($track->plays) }}</h4>
                    <h4 class="track-length">{{ gmdate('i:s', $track->duration) }}</h4>
                </div>
            @endforeach
        </div>
    </div>
@endsection