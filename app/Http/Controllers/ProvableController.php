<?php

namespace App\Http\Controllers;

use Gamebetr\Provable\Provable;
use Illuminate\Http\Request;

class ProvableController extends Controller
{
    public function __invoke(Request $request)
    {
        $clientSeed = $request->get('client_seed');
        $serverSeed = $request->get('server_seed');
        $min = $request->get('min') ?? 1;
        $max = $request->get('max') ?? 52;
        $type = $request->get('type') ?? 'shuffle';
        $provable = Provable::init($clientSeed, $serverSeed, $min, $max, $type);
        return view('provable', ['provable' => $provable]);
    }
}
