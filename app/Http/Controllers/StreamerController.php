<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Country;
use App\Models\Stream;
use App\Models\Streamer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class StreamerController extends Controller
{

    public function validateStream(Request $request)
    {

        $validateStream = Validator::make($request->all(), [
            "stream_title" => "required",
            "stream_description" => "required",
            "stream_date" => "required",
            "stream_ammount_of_viewers" => "required",
            "stream_check_picture_1" => "required",
            "stream_check_picture_2" => "required",
            "campaign_id" => "required",
            "country_id" => "required",
        ]);

        return $validateStream;
    }
    public function editStreamerProfile(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            $streamer->streamer_nick = $request->input("streamer_nick");
            $streamer->streamer_platform = $request->input("streamer_platform");
            $streamer->streamer_revenue = $request->input("streamer_revenue");
            $streamer->image_stream = $request->input("image_stream");

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
            $campaign = Campaign::query()->find($campaign_id);
            $country = Country::query()->find($country_id);
            $price_per_single_view = $campaign->price_per_single_view;
            $total_to_receive = $stream_ammount_of_viewers * $campaign->price_per_single_view *  $country->country_bonus;

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
                "price_per_single_view" => $price_per_single_view,
                "stream_total_to_receive" => $total_to_receive,

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
            $streamer = Streamer::query()
                ->with("streams")
                ->where('user_id', $user->id)->first();
            $streams = Stream::query()->where('streamer_id', $streamer->id)->orderBy('created_at', 'desc')->get();



            $streamer->has_active_campaigns = true;
            $streamer->save();

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
            $streams = Stream::query()
                ->with("campaign")
                ->with("streamer")
                ->with("country")
                ->get();

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




    public function payStream(Request $request)
    {

        try {
            log::info($request->input("stream_id"));
            $user = User::query()->find(auth()->user()->id);
            $streamer = Streamer::query()->where('user_id', $user->id)->first();
            $stream = Stream::query()->find($request->input("stream_id"));


            if ($stream->is_stream_payed) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "stream already paid"
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            if (!$stream->is_stream_approved) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "stream not approved"
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            $streamer->streamer_revenue = $streamer->streamer_revenue + $stream->stream_total_to_receive;
            $stream->is_stream_payed = true;
            $streamer->save();
            $stream->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "stream paid",
                    "stream" => $stream
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "stream not paid"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllActivatedCampaigns(Request $request)
    {
        try {
            $campaigns = Campaign::query()->where('is_active', true)->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "campaigns",
                    "campaigns" => $campaigns
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting campaigns"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteAStreamById($id)
    {
        try {
            $stream = Stream::query()->find($id);
            $stream->delete();
            return response()->json(
                [
                    "success" => true,
                    "message" => "stream deleted",
                    "stream" => $stream
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting stream"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
