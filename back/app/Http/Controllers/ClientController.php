<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Trait\Shared;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ClientController extends Controller
{
    //

    use Shared;
    public function searchByPhone($telephone)
    {
        $client = Client::where("telephone", $telephone)->first();
        if ($client) {
            return $this->responseData("", [$client], true);
        }

        return $this->responseData("", []);
    }

    
    
}
