<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertCampaignRequest;
use App\Models\AdvertCampaign;
use App\Models\AdvertCampaignBanner;
use Illuminate\Http\Request;

class AdvertCampaignsController extends Controller
{
    public function index()
    {
        $campaigns = AdvertCampaign::with('banners')->get();

        return response()->json([
            'success' => true,
            'message' => 'retrieved successfull',
            'data' => $campaigns,
        ]);
    }

    public function store(StoreAdvertCampaignRequest $request)
    {
        $campaign = AdvertCampaign::create($request->except('files'));

        if($request->hasFile('files')){
            foreach($request->file('files') as $req)
            {
                $fileName = time().'_'.$req->getClientOriginalName();
                $req->move(public_path('uploads'), $fileName);

                $campaign->banners()->create([
                    'name' => $fileName,
                    'path' => '/uploads',
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'created successfull',
            'data' => $campaign,
        ]);
    }

    public function show(AdvertCampaign $campaign)
    {
        return response()->json([
            'success' => true,
            'message' => 'retrieved successfully',
            'data' => $campaign,
        ]);
    }

    public function update(StoreAdvertCampaignRequest $request, AdvertCampaign $campaign)
    {
        $campaign->update($request->except('files', 'id'));

        if($request->hasFile('files')){
            foreach($request->file('files') as $req)
            {
                $fileName = time().'_'.$req->getClientOriginalName();
                $req->move(public_path('uploads'), $fileName);

                $campaign->banners()->create([
                    'name' => $fileName,
                    'path' => '/uploads',
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'updated successfull',
            'data' => $campaign,
        ]);
    }
}
