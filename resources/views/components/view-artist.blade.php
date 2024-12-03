@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="banner">
            <img src="{{ Storage::disk('azure')->url($user->profile_picture) }}" alt="Band logo" class="banner-image">
            <div class="banner-data">
                <h1>{{ $user->username }}</h1>
            </div>
        </div>
        <h2 class="section-title">Albums & singles</h2>
        <div class="grid" style="margin: 0 20px;">
            @foreach($albums as $album)
                <a href="{{ route('view-album', $album->album_name) }}" class="album-wrapper">
                    <img src="{{ Storage::disk('azure')->url($album->album_cover) }}" alt="{{ $album->album_name }}">
                    <h4>{{ $album->album_name }}</h4>
                    <h4>Album | {{ \Carbon\Carbon::parse($album->created_at)->format('Y') }}</h4>
                </a>
            @endforeach
        </div>
    </div>
@endsection