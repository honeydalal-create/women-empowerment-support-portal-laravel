<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('woman.articlelisting'); // main articles listing page
    }

    public function breakingBarriers()
{
    return view('woman.articles_breaking_barriers');
}

public function career()
{
    return view('woman.articles_career');
}

public function entrepreneurs()
{
    return view('woman.articles_entrepreneurs');
}

public function health()
{
    return view('woman.articles_health');
}

public function leadership()
{
    return view('woman.articles_leadership');
}

public function selfDefense()
{
    return view('woman.articles_selfdefense');
}
}
