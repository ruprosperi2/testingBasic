<?php

declare(strict_types=1);


namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

final class TagController extends Controller
{
    public function __invoke(Request $request)
    {
       Tag::create($request->all());

        return redirect('/');
    }
}
