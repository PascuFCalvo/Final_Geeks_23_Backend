<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Country;
use App\Models\User;
use App\Models\Streamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                    'password' => bcrypt($request->input('password')),
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
                    "user" => $newUser,
                    "streamer" => $newStreamer
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
                    'password' => bcrypt($request->input('password')),
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

    public function login(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $user = User::query()->where('user_email', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                abort(401, 'Invalid credentials');
            }
            $token = $user->createToken('userToken')->plainTextToken;
            return response()->json(
                [
                    "success" => true,
                    "message" => "User logged in",
                    "data" => [
                        "user" => $user,
                        "token" => $token
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error logging in"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getProfile(Request $request)
    {
        $user = auth()->user();

        if ($user->user_role == 'brand') {
            $brand = Brand::query()->where('user_id', $user->id)->first();
            return response()->json(
                [
                    "success" => true,
                    "message" => "User",
                    "data" => [
                        "user" => $user,
                        "brand" => $brand
                    ]
                ],
                Response::HTTP_OK
            );
        } elseif ($user->user_role == 'streamer') {
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            return response()->json(
                [
                    "success" => true,
                    "message" => "User",
                    "data" => [
                        "user" => $user,
                        "streamer" => $streamer
                    ]
                ],
                Response::HTTP_OK
            );
        }
    }
    public function getCountries(Request $request)
    {
        try {
            $countries = Country::all();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Countries",
                    "data" => $countries
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting countries"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
