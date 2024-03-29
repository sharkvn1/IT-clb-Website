<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;

use App\Http\Requests\V1\StoreUsersRequest;
use App\Http\Requests\V1\UpdateUsersRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;

use App\Data\V1\MembersData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MembersData();
        $filterItems = $filter->transform($request);

        $members = user::where($filterItems);

        $members = $members->with('major', 'course');

        return new UserCollection($members->paginate(5)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        $mailDuplicate = User::where('mail', $request->mail)->exists();
        $usernameDuplicate = User::where('username', $request->username)->exists();
        $studentIdDuplicate = User::where('studentID', $request->studentID)->exists();
        if ($mailDuplicate) {
            return response()->json([
                'message' => 'Mail is already used',
            ], 200);
        } elseif ($usernameDuplicate) {
            return response()->json([
                'message' => 'Username is already used',
            ], 200);
        } elseif ($studentIdDuplicate) {
            return response()->json([
                'message' => 'StudentID is already used',
            ], 200);
        }

        $result =  new UserResource(user::create($request->all()));
        if ($result) {
            return response()->json([
                'message' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'fail',
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $result = user::where('Id', $id)->update($request->all());
        if ($result) {
            return response()->json([
                'message' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'fail',
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $user_data = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if (!Auth::attempt($user_data)) {
            return
                response()->json([
                    'Message' => 'Login failed.'
                ], 401);
        } else {
            $userData = user::where('username', $user_data['username'])->select('Role', 'id')->first();

            $userId = $userData->id;
            $userRole = $userData->Role;

            /** @var \App\Models\User $user **/  $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return  response([
                'Message' => 'Login successful',
                'Token' => $token,
                'Id' => $userId,
                'Role' => $userRole
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response([
            'Message' => 'Logout'
        ], 201);
    }
}
