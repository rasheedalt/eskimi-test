<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertCampaign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_from', 'date_to', 'total_budget', 'daily_budget'];

    public function banners(){
        return $this->hasMany(AdvertCampaignBanner::class, 'advert_campaign_id', 'id');
    }
}
