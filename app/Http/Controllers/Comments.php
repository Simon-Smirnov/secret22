<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Models\Comment;

class Comments extends Controller
{

    public function store(StoreRequest $request)
    {
        if($request->checkIdAndCommentable()) {
            $item = $request->commentable_type::find($request->commentable_id);
            if($item) {
                Comment::create($request->validated());
                return redirect()->route(config('commentable.' . get_class($item))  . '.show', $item->id)->with('success', trans('notifications.comments.add'));
            }
            //dd($item);
        }
        //$request->validated();
        //dd($request->validated());
    }
}
