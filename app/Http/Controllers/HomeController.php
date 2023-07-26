<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Typedoc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->paginate(10);
        $types = Typedoc::paginate();
        return view('home', compact('documents','types'));
    }
}
