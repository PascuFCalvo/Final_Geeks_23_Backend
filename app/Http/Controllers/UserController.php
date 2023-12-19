<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Country;
use App\Models\User;
use App\Models\Streamer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;


class UserController extends Controller
{

    private function validateUser(Request $request)
    {
        $validatorUser = Validator::make($request->all(), [
            'user_name' => 'required|min:3|max:100',
            'user_email' => 'required|unique:users|email',
            'password' => 'required|min:8|max:20',
            'user_phone' => 'required|min:9|max:15',
            'user_avatar_link' => 'required',

        ]);

        return $validatorUser;
    }

    public function validateStreamer(Request $request)
    {
        $validatorStreamer = Validator::make($request->all(), [
            'streamer_nick' => 'required|min:3|max:100',
            'streamer_nif' => 'required|min:9|max:15',
            'streamer_platform' => 'required',
            'country_id' => 'required',

        ]);

        return $validatorStreamer;
    }

    public function validateBrand(Request $request)
    {
        $validatorBrand = Validator::make($request->all(), [
            'brand_name' => 'required|min:3|max:100',
            'brand_cif' => 'required|min:9|max:15',
            'brand_description' => 'required',
            'brand_logo_link' => 'required',
            'country_id' => 'required',


        ]);

        return $validatorBrand;
    }


    public function registerStreamer(Request $request)
    {
        try {
            $validatorUser = $this->validateUser($request);
            if ($validatorUser->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering user",
                        "error" => $validatorUser->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

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

            $validatorStreamer = $this->validateStreamer($request);
            if ($validatorStreamer->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering streamer",
                        "error" => $validatorStreamer->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
            $newStreamer = Streamer::create(
                [
                    'user_id' => $newUser->id,
                    'streamer_nick' => $request->streamer_nick,
                    'streamer_nif' => $request->streamer_nif,
                    'streamer_platform' => $request->streamer_platform,
                    'streamer_revenue' => 0,
                    'country_id' => $request->country_id,
                    'has_active_campaigns' => false,
                    'image_stream' => 'https://d.newsweek.com/en/full/846377/ninja-fortnite-drake.png'
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
            Log::info('Registering brand - 1');
            $validatorUser = $this->validateUser($request);
            Log::info('Registering brand - 2');
            if ($validatorUser->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering user",
                        "error" => $validatorUser->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
            
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
            
            $validatorBrand = $this->validateBrand($request);
            if ($validatorBrand->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering brand",
                        "error" => $validatorBrand->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
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

            if ($user->is_active === false || $user->is_active === 0) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "User is inactive"
                    ],
                    Response::HTTP_UNAUTHORIZED
                );
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
        } elseif ($user->user_role == 'admin') {
            return response()->json(
                [
                    "success" => true,
                    "message" => "User",
                    "data" => [
                        "user" => $user,
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
    public function editUserProfile(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $user->user_name = $request->input("user_name");
            $user->user_email = $request->input("user_email");
            $user->user_phone = $request->input("user_phone");
            $user->user_avatar_link = $request->input("user_avatar_link");

            $user->save();
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
            $token->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User updated",
                    "data" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error editing user profile"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function inactivate(Request $request)
    {
        try {
            $user = User::query()->find(auth()->user()->id);
            $user->is_active = false;
            $user->save();
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
            $token->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User inactivated",
                    "data" => $user
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
}
