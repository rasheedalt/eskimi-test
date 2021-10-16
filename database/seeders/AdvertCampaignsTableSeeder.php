<?php

namespace Database\Seeders;

use App\Models\AdvertCampaign;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdvertCampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = [
            [
                'id' => 1,
                'name' => 'Jan fiesta',
                'date_from' => date('Y/m/d', strtotime('1/3/2021')),
                'date_to' => date('Y/m/d', strtotime('1/4/2021')),
                'total_budget' => 1800.50,
                'daily_budget' => 1000.25,
            ],
            [
                'id' => 2,
                'name' => 'New Jam',
                'date_from' => date('Y/m/d', strtotime('1/3/2021')),
                'date_to' => date('Y/m/d', strtotime('1/4/2021')),
                'total_budget' => 1800.50,
                'daily_budget' => 1000.25,
            ],
            [
                'id' => 3,
                'name' => 'Lamp stack',
                'date_from' => date('Y/m/d', strtotime('1/3/2021')),
                'date_to' => date('Y/m/d', strtotime('1/4/2021')),
                'total_budget' => 1800.50,
                'daily_budget' => 1000.25,
            ],
            [
                'id' => 4,
                'name' => 'Jam Jam',
                'date_from' => date('Y/m/d', strtotime('1/3/2021')),
                'date_to' => date('Y/m/d', strtotime('1/4/2021')),
                'total_budget' => 1800.50,
                'daily_budget' => 1000.25,
            ],
        ];

        foreach($campaigns as $campaign){
            AdvertCampaign::updateOrCreate(['id' => $campaign['id']], $campaign);
        }
    }
}
