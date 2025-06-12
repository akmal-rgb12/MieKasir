<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->where('role', '!=', 'admin')
            ->paginate(10);

        return view('apps.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            // validate request
            $validated = $request->validated();

            // create user
            $user = User::make($validated);
            $user->password = Hash::make($validated['password']);
            $user->saveOrFail();

            // redirect to users index with success message
            return redirect()->route('users.index')->with([
                'success' => 'User created successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('User creation failed: ' . $e->getMessage());

            // redirect to users create with error message
            return redirect()->route('users.create')->with([
                'error' => 'User creation failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('apps.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('apps.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();

            // update password if password is not null
            if ($request->password) {
                $validated['password'] = Hash::make($request->password);
            }

            // update user
            $user->fill($validated);
            $user->saveOrFail();

            // redirect to users index with success message
            return redirect()->route('users.index')->with([
                'success' => 'User updated successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('User update failed: ' . $e->getMessage());

            // redirect to users edit with error message
            return redirect()->route('users.edit', $user)->with([
                'error' => 'User update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // delete user
            $user->delete();

            // redirect to users index with success message
            return redirect()->route('users.index')->with([
                'success' => 'User deleted successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('User deletion failed: ' . $e->getMessage());

            // redirect to users index with error message
            return redirect()->route('users.index')->with([
                'error' => 'User deletion failed',
            ]);
        }
    }
}
