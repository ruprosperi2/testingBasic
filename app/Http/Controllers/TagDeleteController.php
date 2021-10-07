<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

final class TagDeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        return redirect('/');
    }
}
