<?php

namespace App\Http\Controllers;

use App\Models\commentss;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsViewAdmin extends Controller
{
    public function CommentsView()
    {
        $comments = commentss::orderBy('id', 'DESC')->paginate(5);
        $user = User::all();
        return view('Admin.Comments.index', compact('user', 'comments'))->with('title', 'مدیریت پغام ها');
    }

    public function EditCommentsOne(commentss $id)
    {
        if ($id->Status == 1) {
            $id->Status = 0;
        } elseif ($id->Status == 0) {
            $id->Status = 1;
        }
        $id->save();
        return back()->with('msg' , 'پیام مورد نظر ویرایش شد');
    }
    public function DeleteCommentsOne(commentss $id){
        $id->delete();
        return back()->with('msg' , 'پیام مورد نظر حذف شد');

    }
}
