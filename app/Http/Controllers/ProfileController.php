<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Return the view
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // Get user
        $user = $request->user();

        // Validate form fields
        $validated = $request->validate([
            'profile_picture' => 'nullable'|'image',
            'email' => 'required'|'email'|'unique:users,email' . $user->id,
            'password' => 'min:5'|'confirmed',
        ]);

        // If new profil image
        if ($request->hasFile('profile_picture')) {
            // Delete the old image
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $path;
        }
        // If new email update and resets the check
        if ($user->email !== $validated['email']) {
            $user->email = $validated['email'];
            $user->email_verified_at = null;
        }
        // If new password we encrypted with Hash
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Save the modification
        $user->save();

        // Redirect and print a success message
        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Get the current user
        $user = $request->user();

        // Logout the user
        Auth::logout();

        // Delete user
        $user->delete();

        // Invalidate session
        $request->session()->invalidate();

        // Generate new token
        $request->session()->regenerateToken();

        // Redirect tou home page
        return Redirect::to('/');
    }
}
