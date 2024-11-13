<?php

namespace App\Http\Controllers;

use App\Models\DigitalMedia;
use Illuminate\Http\Request;

class DigitalmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $digitalmedias = DigitalMedia::all();

        $response = [
            'message' => 'Success Showing All Data',
            'data' => $digitalmedias
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'url' => 'required|url',
            'url_image' => 'nullable|url',
            'published_at' => 'required|date',
            'category' => 'required|string',
        ]);

        // Mendefinisikan data input
        $input = [
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'content' => $request->content,
            'url' => $request->url,
            'url_image' => $request->url_image,
            'published_at' => $request->published_at,
            'category' => $request->category,
        ];

        // Menyimpan data ke dalam database
        $digitalmedia = DigitalMedia::create($input);

        // Mengembalikan response JSON jika berhasil
        $response = [
            'message' => 'Resource is added successfully',
            'data' => $digitalmedia
        ];

        return response()->json($response, 201);
    }

    public function show($id)
    {
        // Mencari resource berdasarkan ID
        $digitalmedia = DigitalMedia::find($id);

        // Jika resource ditemukan
        if ($digitalmedia) {
            $response = [
                'message' => 'Get Detail Resource',
                'data' => $digitalmedia
            ];
            return response()->json($response, 200);
        }

        // Jika resource tidak ditemukan
        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }

    public function update(Request $request, $id)
    {
        // Mencari resource berdasarkan ID
        $digitalmedia = DigitalMedia::find($id);

        // Jika resource tidak ditemukan
        if (!$digitalmedia) {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        // Mendefinisikan data input
        $input = $request->only([
            'title', 'author', 'description', 'content',
            'url', 'url_image', 'published_at', 'category'
        ]);

        // Memperbarui data resource
        $digitalmedia->update($input);

        // Mengembalikan response JSON jika berhasil
        $response = [
            'message' => 'Resource is update successfully',
            'data' => $digitalmedia
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
{
    // Mencari resource berdasarkan ID
    $digitalmedia = DigitalMedia::find($id);

    // Jika resource tidak ditemukan
    if (!$digitalmedia) {
        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }

    // Menghapus resource
    $digitalmedia->delete();

    // Mengembalikan response JSON jika berhasil dihapus
    return response()->json([
        'message' => 'Resource is delete successfully'
    ], 200);
}

public function searchByTitle(Request $request)
{
    // Mencari resource berdasarkan title
    $keyword = $request->input('title');
    $digitalmedias = DigitalMedia::where('title', 'like', '%' . $keyword . '%')->get();

    // Jika resource ditemukan
    if ($digitalmedias->isNotEmpty()) {
        return response()->json([
            'message' => 'Get searched resource',
            'data' => $digitalmedias
        ], 200);
    }

    // Jika resource tidak ditemukan
    return response()->json([
        'message' => 'Resource not found'
    ], 404);
    }


   public function getSportResource()
    {
        $sportResources = DigitalMedia::where('category', 'LIKE', 'Sport')->get();

        if ($sportResources->isNotEmpty()) {
            return response()->json([
                'message' => 'Get sport resource',
                'total' => $sportResources->count(),
                'data' => $sportResources
            ], 200);
        }

        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }

    // Get all resources in the Finance category
    public function getCuacaResource()
    {
        $cuacaResources = DigitalMedia::where('category', 'cuaca')->get();

        if ($cuacaResources->isNotEmpty()) {
            return response()->json([
                'message' => 'Get finance resource',
                'total' => $cuacaResources->count(),
                'data' => $cuacaResources
            ], 200);
        }

        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }

    // Get all resources in the Automotive category
    public function getAutomotiveResource()
    {
        $automotiveResources = DigitalMedia::where('category', 'Automotive')->get();

        if ($automotiveResources->isNotEmpty()) {
            return response()->json([
                'message' => 'Get automotive resource',
                'total' => $automotiveResources->count(),
                'data' => $automotiveResources
            ], 200);
        }

        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }


}
