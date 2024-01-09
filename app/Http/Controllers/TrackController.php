<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->get();

        // pour afficher dans l'ordre alphabétique
        // $tracks = Track::orderBy('title')->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'music' => ['required', 'file', 'extensions:mp3,wav'],
            'display' => ['required', 'boolean']
        ]);

        $uuid = 'trk-' . Str::uuid();

        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAs('traks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAs('traks/musics', $uuid . '.' . $musicExtension);

        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'image' => $imagePath,
            'music' => $musicPath,
            'display' => $request->display,
        ]);

        // return redirect()->route('tracks.index');

        // dd($request->all());
    }
}