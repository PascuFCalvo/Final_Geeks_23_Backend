<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function editBrandProfile(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $brand = Brand::query()->where('user_id', $user->id)->first();
            $brand->brand_name = $request->input("brand_name");
            $brand->brand_description = $request->input("brand_description");
            $brand->brand_logo_link = $request->input("brand_logo_link");

            $brand->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "brand profile updated",
                    "brand" => $brand
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating streamer profile"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function getAllBrands(Request $request)
    {
        try {
            $brands = Brand::query()->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "brands retrieved",
                    "brands" => $brands
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error retrieving brands"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function createACampaign(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $brand = Brand::query()->where('user_id', $user->id)->first();
            $campaign = new Campaign();
            $campaign->brand_id = $brand->id;
            $campaign->campaign_name = $request->input("campaign_name");
            $campaign->campaign_description = $request->input("campaign_description");
            $campaign->campaign_start_date = $request->input("campaign_start_date");
            $campaign->price_per_single_view = $request->input("price_per_single_view");
            $campaign->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "campaign created",
                    "campaign" => $campaign
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating campaign"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getCampaignsAsABrand(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $brand = Brand::query()->where('user_id', $user->id)->first();
            $campaigns = Campaign::query()->where('brand_id', $brand->id)->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "campaigns retrieved",
                    "campaigns" => $campaigns
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error retrieving campaigns"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteACampaign(Request $request, $id)
    {
        try {
            $deletedCampaign = Campaign::destroy($id);
            return response()->json(
                [
                    "success" => true,
                    "message" => "campaign deleted successfully",
                    "data" => $deletedCampaign
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting videogame"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
