<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updateEmail', [
            'current_password' => ['required', 'current_password'],
            'email' => ['required', 'email',],
        ]);

        /*        $request->user()->update([
                    'email' => $validated['email'],
                ]);*/

        return back()->with('status', 'email-updated');
    }
}
