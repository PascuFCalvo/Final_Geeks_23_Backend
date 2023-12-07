<?php

namespace App\Http\Controllers;


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
}
