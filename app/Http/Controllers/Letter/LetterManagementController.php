<?php

namespace App\Http\Controllers\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Symfony\Component\HttpFoundation\Response;


class LetterManagementController extends Controller
{
    public function index()
    {
        return view('letter.index', [
            'letters' => Letter::where('user_id', auth()->id())->orderByDesc('created_at')->latest()->paginate(5),
            'lettersContentLimit' => 50,
        ]);
    }

    public function show(Letter $letter)
    {
        if($letter['user_id'] === auth()->id()){
            return view('letter.show', [
                'letter' => $letter,
            ]);
        }else{
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    public function edit(Letter $letter)
    {
        if($letter['user_id'] === auth()->id()){
            return view('letter.edit', [
                'letter' => $letter,
            ]);
        }else{
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    public function update()
    {
        $id = request()->route('letter');
        $letter = Letter::findOrFail($id);

        abort_if(auth()->id() !== $letter->user_id, Response::HTTP_FORBIDDEN);

        $attributes = request()->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3|max:10000',
            'delivery_date' => 'required|date|after:today',
        ]);

        $letter->update($attributes);

        return redirect()->route('letter.index')->with('success', 'Letter has been successfully updated!');
    }

    public function destroy()
    {
        $id = request()->route('letter');
        $letter = Letter::findOrFail($id);

        abort_if(auth()->id() !== $letter->user_id, Response::HTTP_FORBIDDEN);

        $letter->delete();

        return redirect()->route('letter.index')->with('success', 'Letter has been successfully deleted!');
    }
}
