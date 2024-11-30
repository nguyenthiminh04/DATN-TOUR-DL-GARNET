<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admins\Categoty_tour;
use App\Models\Article;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categotyTour = Categoty_tour::all();
        $article = Article::limit(4)->get();
        return view('client.pages.service',compact('categotyTour','article'));
    }
    public function show(string $id)
    {
        $showArticle = Categoty_tour::find($id);
        return view('client.pages.detailHandbook', compact('showArticle'));
    }

}
