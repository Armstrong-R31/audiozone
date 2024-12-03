<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;
use FFMpeg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function uploadAlbum(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->withErrors('You must be logged in to upload an album.');
        }

        $validated = $request->validate([
            'album-cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'album-title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'tags' => 'nullable|string',
            'song-titles' => 'required|array',
            'tracks' => 'required|array',
            'tracks.*' => 'file|mimes:mp3,wav,ogg|max:15000'
        ]);

        if ($request->hasFile('album-cover')) {
            $albumCover = $request->file('album-cover');
            $uniqueCoverPath = Str::uuid() . '.' . $albumCover->getClientOriginalExtension();
            $coverPath = $albumCover->storeAs('album_covers', $uniqueCoverPath, 'azure');
            if (!$coverPath) {
                return response()->json(['error' => 'Failed to store album cover.'], 500);
            }
        } else {
            return response()->json(['error' => 'No album cover uploaded.'], 400);
        }

        $album = Album::create([
            'album_name' => $validated['album-title'],
            'album_cover' => $coverPath,
            'user_id' => Auth::user()->id,
            'genre' => $validated['genre'],
            'tags' => $validated['tags'],
        ]);

        if ($request->hasFile('tracks')) {
            $tracks = $request->file('tracks');
            $songTitles = $validated['song-titles'];
    
            foreach ($tracks as $index => $trackFile) {
                $uniqueTrackPath = Str::uuid() . '.' . $trackFile->getClientOriginalExtension();
                $trackPath = $trackFile->storeAs('tracks', $uniqueTrackPath, 'azure');
   
                $ffmpeg = FFMpeg\FFMpeg::create();
                $audio = $ffmpeg->open($trackFile->getPathname());
                $duration = $audio->getFormat()->get('duration');
    
                Song::create([
                    'title' => $songTitles[$index],
                    'album_id' => $album->id,
                    'duration' => $duration,
                    'genre' => $validated['genre'],
                    'file_url' => $trackPath,
                ]);
            }
        }

        return redirect()->route('view-album', ['album_name' => $album->album_name]);
    }

    public function index()
    {
        $albums = Album::all();

        return $albums;
    }

    public function viewAlbum($album_name)
    {
        $album = Album::with('tracks')
        ->where('album_name', $album_name)
        ->firstOrFail();

        return view('components.view-album', [
            'album' => $album,
            'tracks' => $album->songs,
        ]);
    }
}
