<?php

namespace App\Http\Controllers;


use App\Models\Stream;
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

    public function reportAStream(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            $stream_title = $request->input("stream_title");
            $stream_description = $request->input("stream_description");
            $stream_date = $request->input("stream_date");
            $stream_ammount_of_viewers = $request->input("stream_ammount_of_viewers");
            $stream_check_picture_1 = $request->input("stream_check_picture_1");
            $stream_check_picture_2 = $request->input("stream_check_picture_2");
            $campaign_id = $request->input("campaign_id");
            $country_id = $request->input("country_id");

            $Stream = Stream::query()->create([
                "streamer_id" => $streamer->id,
                "stream_title" => $stream_title,
                "stream_description" => $stream_description,
                "stream_date" => $stream_date,
                "stream_ammount_of_viewers" => $stream_ammount_of_viewers,
                "stream_check_picture_1" => $stream_check_picture_1,
                "stream_check_picture_2" => $stream_check_picture_2,
                "campaign_id" => $campaign_id,
                "country_id" => $country_id,
            ]);

            return response()->json(
                [
                    "success" => true,
                    "message" => "stream created",
                    "stream" => $Stream
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error reporting stream"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating a stream"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function getStreamsByStreamer(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            $streams = Stream::query()->where('streamer_id', $streamer->id)->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "streams",
                    "streams" => $streams
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting streams"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllStreams(Request $request)
    {
        try {
            $streams = Stream::all();

            return response()->json(
                [
                    "success" => true,
                    "message" => "streams",
                    "streams" => $streams
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting streams"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
