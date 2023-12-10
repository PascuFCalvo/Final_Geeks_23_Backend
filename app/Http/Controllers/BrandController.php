<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
}
