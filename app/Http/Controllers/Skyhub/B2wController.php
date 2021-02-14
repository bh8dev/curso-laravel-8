<?php

namespace App\Http\Controllers\Skyhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class B2wController extends Controller
{
    public function index()
    {
        $categories = Http::withHeaders($headers)->get($url);

        return view('admin.b2w.index', compact('categories'));
    }
}
