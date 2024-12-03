@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <form id="upload-wrapper" action="{{ route('upload-album') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="banner">
                <div id="album-cover-wrapper" class="banner-image">
                    <input type="file" id="album-cover-input" class="file-input" name="album-cover">
                    <label id="album-cover-label" for="album-cover-input"></label>
                    <img id="album-cover-preview" src="" alt="Album logo">
                </div>
                <input type="text" class="album-metadata-input" id="album-title-input" placeholder="Album title..." name="album-title">
            </div>
            <div id="genre-tags">
                <input type="text" class="album-metadata-input" id="album-genre-input" placeholder="Genre" name="genre">
                <input type="text" class="album-metadata-input" id="album-tags-input" placeholder="Tags (separate tags by ',')" name="tags">
            </div>
            <div id="upload-tracks-wrapper">
                <input type="file" id="upload-tracks-input" class="file-input" name="tracks[]" multiple required>
                <label id="upload-tracks-input-label" for="upload-tracks-input"></label>
            </div>
            <div class="headings">
                <h3 class="track-number-heading">#</h3>
                <h3 class="track-title-heading">Title</h3>
                <h3 class="track-filename-heading">Filename</h3>
                <h3 class="track-filetype-heading">Filetype</h3>
                <h3 class="track-length-heading">length</h3>
            </div>
            <div class="track-container" id="track-form"></div>
            <button type="submit" id="upload-album"><h3>Upload album / track</h3></button>
        </form>
    </div>
@endsection