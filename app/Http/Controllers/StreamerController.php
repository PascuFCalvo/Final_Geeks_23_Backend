<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class StreamerController extends Controller
{
    public function editStreamerProfile(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            $streamer->streamer_nick = $request->input("streamer_nick");
            $streamer->streamer_platform = $request->input("streamer_platform");

            $streamer->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "streamer profile updated",
                    "streamer" => $streamer
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
