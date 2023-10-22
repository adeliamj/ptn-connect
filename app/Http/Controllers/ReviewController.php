<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'review' => 'required',
        ]);

        DB::table('reviews')->insert([
            'review' => $validatedData['review'],
        ]);

        // Tambahkan logika tambahan jika diperlukan

        return redirect()->back()->with('success', 'Review sent successfully!');
    }
}

