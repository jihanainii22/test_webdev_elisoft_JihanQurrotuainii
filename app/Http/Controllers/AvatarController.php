<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function showForm()
    {
        return view('avatar');
    }

    public function generate(Request $request)
    {
        $text = $request->input('text');
        $avatarUrl = 'https://robohash.org/' . urlencode($text) . '.png';

        return response()->json(['avatarUrl' => $avatarUrl]);
    }
}
