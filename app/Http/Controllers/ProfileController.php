<?php

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index() 
    {
        $profiles = Profile::get();

        return response()->json(['profiles'=> $profiles]);
    }
}