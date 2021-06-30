<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    protected function fileUpload(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
  
        $fileName = $request->file->getClientOriginalName();
   
        $request->file->move(public_path('storage'), $fileName);

        $content_file = File::get(public_path("storage/{$fileName}"));

        $content = explode(":", $content_file);


        if (count($content) > 3 ) {
            for ($i = 0; $i < count($content); $i+= 3) {
                Account::create([
                    "category" => $content[$i],
                    "email" => $content[$i+1],
                    "password" => $content[$i+2]
                ]);
            }
        }
        else {
        Account::create([
            "category" => $content[0],
            "email" => $content[1],
            "password" => $content[2]
        ]);

    }
        File::delete(public_path("storage/{$fileName}"));

        return back()
            ->with('success.file_uploaded',"Le fichier {$fileName} a bien été ajouté !")
            ->with('file',$fileName);

    }

    protected function accountFind($name) {
        $account = Account::where("category", $name)->get()->first();
        if (!$account) return redirect()->route("home")->with("error.not_category", "La catégorie {$name} n'existe pas !");
        switch($name) {
            case "netflix": {
                $name = "Netflix";
                $image_logo = asset("images/netflix.svg");
                $color = "#cb0015";
                break;
            }

            case "steam": {
                $name = "Steam";
                $image_logo = asset("images/steam.svg");
                $color = "#061938";
                break;
            }

            case "telegram": {
                $name = "Telegram";
                $image_logo = asset("images/telegram.svg");
                $color = "#34acdf";
                break;
            }

            case "origin": {
                $name = "Origin";
                $image_logo = asset("images/origin.svg");
                $color = "#f15a1e";
                break;
            }
        }
        return view("accounts.account", ["name" => $name, "image_logo" => $image_logo, "color" => $color]);
    }

    protected function accountID($id) {
        $claim = Account::where("id", $id)->get()->first();
        if(!$claim) return redirect()->route("home")->with("error.account_not_found", "Le compte avec l'identifiant {$id} n'a pas été trouvé..");
        \App\Models\ClaimedAccounts::create([
            "user_id" => Auth::user()->id,
            "category" => $claim["category"],
            "email" => $claim["email"],
            "password" => $claim["password"]
        ]);
        Account::where("id", $id)->delete();
        return redirect()->route("claimed_accounts")->with("success.claimed_account", "Votre nouveau compte {$claim['category']} a bien été ajouté à votre compte.");
    }

    protected function deleteAccountID($id) {
        $claim = Account::where("id", $id)->get()->first();
        if(!$claim) return redirect()->route("home")->with("error.account_not_found", "Le compte avec l'identifiant {$id} n'a pas été trouvé..");
        Account::where("id", $id)->delete();
        return redirect()->route("home")->with("success.account_deleted", "Le compte {$claim['category']} a bien été supprimé..");
    }

    protected function deleteClaimedAccountID($id) {
        $claim = \App\Models\ClaimedAccounts::where("user_id",Auth::user()->id)->where("id", $id)->get()->first();
        if(!$claim) return redirect()->route("home")->with("error.account_not_found", "Le compte avec l'identifiant {$id} n'a pas été trouvé..");
        \App\Models\ClaimedAccounts::where("user_id",Auth::user()->id)->where("id", $id)->delete();
        return redirect()->route("home")->with("success.account_deleted", "Le compte {$claim['category']} a bien été supprimé..");
    }
}
