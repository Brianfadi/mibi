<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(30);
        $totalSize = Media::sum('size');
        $totalFiles = Media::count();
        $byType = Media::select('mime_type', DB::raw('count(*) as count'))
            ->groupBy('mime_type')->get();

        return view('admin.media.index', compact('media', 'totalSize', 'totalFiles', 'byType'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:10240'], // 10MB max
            'collection' => ['nullable', 'string', 'max:100'],
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads/' . ($request->collection ?? 'general'), 'public');

        Media::create([
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'file_name' => $file->getClientOriginalName(),
            'disk' => 'public',
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'collection_name' => $request->collection ?? 'general',
        ]);

        return back()->with('success', 'File uploaded.');
    }

    public function destroy(Media $media)
    {
        \Storage::disk($media->disk)->delete($media->path);
        $media->delete();
        return back()->with('success', 'File deleted.');
    }
}
