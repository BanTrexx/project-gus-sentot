<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\District;
use App\Models\Supporter;
use App\Models\Village;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'jogorotoChart' => $this->getStatistic(3517110),
            'diwekChart' => $this->getStatistic(3517040),
            'sumobitoChart' => $this->getStatistic(3517100),
            'villageCount' => Village::count(),
            'coordinatorCount' => Coordinator::count(),
            'supporterCount' => Supporter::count(),
        ]);
    }

    protected function getStatistic($districtId, $title = '')
    {
        $districtStatistic = Village::query()->where('district_id', $districtId)->chunkMap(function ($data) {
            $supporterCount= $data->coordinators()->chunkMap(function ($coordinator) {
                return $coordinator->supporters()->count();
            })->toArray();

            $data->coordinator_count = $data->coordinators()->count();
            $data->supporter_count = array_sum($supporterCount);
            return $data;
        });

        $chart = (new ColumnChartModel())
            ->setTitle($title)
            ->setAnimated(true)
        ;

        foreach ($districtStatistic as $item) {
            $chart->addColumn($item->name, $item->supporter_count, $this->randColor());
        }

        return $chart;
    }

    protected function randColor()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
