<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Auth;
use App\Models\Actuality;

class ActualityController extends Controller
{
    protected function createActu(Request $request) {
        $request->validate([
            "title" => "required|min:5",
            "content" =>  "required|min:10",
        ]);
        $input = $request->all();
        Actuality::create([
            "title" => $input["title"],
            "content" => Markdown::convertToHtml($input["content"]),
            "by" => Auth::user()->name
        ]);
        return redirect()->route("home")->with("success.actuality_created", "L'actualité au nom de {$input['title']} a bien été crée !");
    }
}
