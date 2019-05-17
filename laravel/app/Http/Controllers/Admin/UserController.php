<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ImageUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        if ($request->hasFile('avatar_file')) {
            $request->request->add(['avatar' => basename(Storage::put('public', $request->avatar_file))]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'avatar' => $request->avatar ? $request->avatar : null
        ]);

        flash_message('User ' . $request->name . ' successfully created.');

        return redirect()->route('admin.users.index');

    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        if ($request->hasFile('avatar_file')) {
            $request->request->add(['avatar' => basename(Storage::put('public', $request->avatar_file))]);

            if ($user->avatar) {
                if (ImageUtil::isExists($user->avatar)) {
                    Storage::delete('public/' . $user->avatar);
                }
            }
        }

        $request_exception = ['_method', '_token', 'avatar_file', 'password_confirmation'];
        if (empty($request->password)) {
            array_push($request_exception, 'password');
        }

        $user->update($request->except($request_exception));

        flash_message('User ' . $request->name . ' saved successfully.');

        return redirect()->route('admin.users.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        flash_message('User ' . $user->name . ' deleted successfully.', 'warning');

        return redirect()->route('admin.users.index');
    }
}
