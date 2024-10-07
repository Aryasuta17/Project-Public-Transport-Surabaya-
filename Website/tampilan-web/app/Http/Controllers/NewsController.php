<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan gambar ke folder storage
        }

        // Create news with image
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News added successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image) {
                \Storage::delete('public/' . $news->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $news->image = $imagePath;
        }

        // Update news data
        $news->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $news->image,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Hapus gambar dari storage
        if ($news->image) {
            \Storage::delete('public/' . $news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
}
