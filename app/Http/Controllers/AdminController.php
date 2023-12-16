<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Stream;
use App\Models\Streamer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function getAllUsers(Request $request)
    {
        try {
            $users = User::query()
                ->orderBy('user_name', 'asc')->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "users retrieved",
                    "users" => $users
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error retrieving users"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getUserById($id)
    {
        try {
            $user = User::query()
                ->where('id', $id)
                ->first();
            return response()->json(
                [
                    "success" => true,
                    "message" => "user retrieved",
                    "user" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error retrieving user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteUserById($id)
    {
        try {
            $user = User::query()
                ->where('id', $id)
                ->first();
            $user->delete();
            return response()->json(
                [
                    "success" => true,
                    "message" => "user deleted",
                    "user" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function activateUserById($id)
    {
        try {
            $user = User::query()
                ->where('id', $id)
                ->first();
            $user->is_active = true;
            $user->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "user inactivated",
                    "user" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error inactivating user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function inactivateUserById($id)
    {
        try {
            $user = User::query()
                ->where('id', $id)
                ->first();
            $user->is_active = false;
            $user->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "user inactivated",
                    "user" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error inactivating user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllStreams(Request $request)
    {
        try {
            $streams = Stream::query()
                ->orderBy('stream_date', 'asc')
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

    public function getAllCampaigns(Request $request)
    {
        try {
            $campaigns = Campaign::query()
                ->orderBy('campaign_name', 'desc')
                ->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "campaigns",
                    "campaigns" => $campaigns
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting campaigns"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllBrands(Request $request)
    {
        try {
            $brands = Brand::query()
                ->orderBy('brand_name', 'asc')
                ->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "brands",
                    "brands" => $brands
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting brands"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function getAllStreamers(Request $request)
    {
        try {
            $streamers = Streamer::query()
                ->orderBy('streamer_nick', 'asc')
                ->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "streamers",
                    "streamers" => $streamers
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting streamers"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function approveAStream($id)
    {
        try {
            $stream = Stream::query()->find($id);
            $stream->is_stream_approved = true;
            $stream->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "stream approved",
                    "stream" => $stream
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error approving stream"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
