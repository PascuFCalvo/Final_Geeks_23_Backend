<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use App\Models\Streamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{
    public function registerStreamer(Request $request)
    {
        try {
            $newUser = User::create(
                [
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'password' => $request->password,
                    'user_phone' => $request->user_phone,
                    'user_role' => 'streamer',
                    'is_active' => true,
                    'user_avatar_link' => $request->user_avatar_link,
                ]
            );
            $newStreamer = Streamer::create(
                [
                    'user_id' => $newUser->id,
                    'streamer_nick' => $request->streamer_nick,
                    'streamer_nif' => $request->streamer_nif,
                    'streamer_platform' => $request->streamer_platform,
                    'streamer_revenue' => 0,
                    'country_id' => $request->country_id,
                    'has_active_campaigns' => false,

                ]
            );
            return response()->json(
                [
                    "success" => true,
                    "message" => "streamer registered",
                    "data" => $newStreamer
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error registering user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function registerBrand(Request $request)
    {
        try {
            $newUser = User::create(
                [
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'password' => $request->password,
                    'user_phone' => $request->user_phone,
                    'user_role' => 'brand',
                    'is_active' => true,
                    'user_avatar_link' => $request->user_avatar_link,
                ]
            );

            $newBrand = Brand::create(
                [
                    'user_id' => $newUser->id,
                    'brand_name' => $request->brand_name,
                    'brand_cif' => $request->brand_cif,
                    'brand_description' => $request->brand_description,
                    'brand_logo_link' => $request->brand_logo_link,
                    'country_id' => $request->country_id,
                    'has_active_campaigns' => false,
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "brand registered",
                    "data" => $newBrand
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error registering user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
