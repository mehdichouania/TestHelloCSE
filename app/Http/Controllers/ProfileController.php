<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() : JsonResponse
    {
        $profiles = Profile::get();

        return response()->json(['profiles'=> $profiles]);
    }

    public function get(Request $request, int $id) : JsonResponse
    {
        $profile = Profile::findOrFail($id);

        return response()->json(['profile' => $profile]);
    }

    public function create(CreateProfileRequest $request) : JsonResponse
    {
        $file = $request->file('image');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = storage_path('app/public/images/');
        
        Profile::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'image' => $filename,
            'status' => $request->status
        ]);

        $file->move($path, $filename);

        return response()->json([
            'success' => true,
        ]);
    }

    public function update(UpdateProfileRequest $request, int $id) : JsonResponse
    {
        $profile = Profile::findOrFail($id);

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $file->move(storage_path('app/public/images/'), $profile->image);
        }

        $profile->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    
    public function delete(Request $request, int $id) : JsonResponse
    {
        $profile = Profile::findOrFail($id);

        $profile->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}