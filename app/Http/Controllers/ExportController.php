<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\Supporter;
use App\Models\Village;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportVoterList()
    {
        $supporters = Supporter::query()->where('coordinator_id', 1)->get();
        $coordinator = Coordinator::query()->where('id', 1)->first();
        $data = [
            'district'    => $coordinator->village->district->name,
            'village'     => $coordinator->village->name,
            'coordinator' => $coordinator,
            'supporters'  => $supporters,
        ];
        return view('pages.export.voter-list', $data);
    }
}
