<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            
            // Create user-specific directory path
            $userPath = 'user/' . Auth::id() . '/product-photos';
            
            // Store the file in private storage
            $path = $photo->storeAs($userPath, $filename, 'private');
            
            return response()->json(['path' => $path]);
        }
        
        return response()->json(['error' => 'No file uploaded.'], 400);
    }

    public function show($filename)
    {
        $path = 'user/' . Auth::id() . '/product-photos/' . $filename;
        
        if (Storage::disk('private')->exists($path)) {
            return Storage::disk('private')->response($path);
        }
        
        abort(404);
    }

    public function destroy($filename)
    {
        $path = 'user/' . Auth::id() . '/product-photos/' . $filename;
        Storage::disk('private')->delete($path);
        return response()->json(['message' => 'File deleted successfully']);
    }
}
