<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index() {
        $doc = Document::paginate(1000);
        // dd($doc);
        return view('document.index',['document'=>$doc]);
    }
}
