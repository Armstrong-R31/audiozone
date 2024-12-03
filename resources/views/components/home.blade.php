@extends('layouts.app')

@section('content')
    <div class="wrapper" id="home-wrapper">
        <div id="extendable">
            <h1>Top albums</h1>
            <div class="grid">
                <a href="" class="album-wrapper">
                    <img src="" alt="Album name">
                    <h4>Album name</h4>
                    <h4>Album | 2024</h4>
                </a>
            </div>
            <h1>Top artists</h1>
            <div class="grid">
                <a href="" class="album-wrapper">
                    <img src="" alt="Artist name">
                    <h4>Artist name</h4>
                </a>
            </div>
            <h1>Top tracks</h1>
            <div class="headings">
                <h3 class="track-number-heading">#</h3>
                <h3 class="track-title-heading">Title</h3>
                <h3 class="track-plays-heading">Plays</h3>
                <h3 class="track-length-heading">Length</h3>
            </div>
            <div class="track-container">
                <div class="track">
                    <button class="track-number">
                        <h4 class="track-index">1</h4>
                        <i class="fa-solid fa-play play-track"></i>
                    </button>
                    <div class="track-data">
                        <h4 class="track-title">Song title</h4>
                        <a href="" class="track-artist">band</a>
                    </div>
                    <h4 class="track-plays">1,789,434</h4>
                    <h4 class="track-length">6:53</h4>
                </div>
                <div class="track">
                    <button class="track-number">
                        <h4 class="track-index">1</h4>
                        <i class="fa-solid fa-play play-track"></i>
                    </button>
                    <div class="track-data">
                        <h4 class="track-title">Song title</h4>
                        <a href="" class="track-artist">band</a>
                    </div>
                    <h4 class="track-plays">1,789,434</h4>
                    <h4 class="track-length">6:53</h4>
                </div>
            </div>
        </div>
    </div>
@endsection