<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\Post;

use App\User;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public  function Createpost(){
        return view('createpost');
    }


    public  function Allpost(){

        $post = DB::table('post')
            ->select('post.id','post.Heading')
            ->orderBy('post.id','DESC')
            ->get();


        return view('Allpost',['post'=>$post]);
    }

    public function OnePage($id)
    {

        $post = DB::table('post')
            ->where('id', '=', $id)
            ->select('post.Heading', 'post.Text', 'post.UserName', 'post.UserId', 'post.created_at','post.id')
            ->get();

        $comment = DB::table('Comment')
            ->where('PostId', '=', $id)
            ->select('Comment.PostId', 'Comment.UserId', 'Comment.UserName', 'Comment.Comment', 'Comment.created_at')
            ->get();




        return view('postpage', ['post' => $post, 'comment' => $comment]);
    }


    public function Createnewpost(Request $request){


        $validation=Validator::make($request->all(),[
            'Heading' =>'required',
            'Text'=>'required',
        ]);


        if ($validation->fails())
        {
            session()->flash('error','Filed is Empty!!!');
            return redirect()->back();
        }

        else {
            $Post = new Post();
            $Post->Heading = $request->input('Heading');
            $Post->Text = $request->input('Text');
            $Post->UserName = $request->input('UserName');
            $Post->UserId = $request->input('UserId');
            $Post->save();

            if ($Post) {
                session()->flash('notif', 'New Post Created..');
                return redirect()->back();
            } else {
                throw new Exception('Error in saving data.');
            }
        }
    }

    public function PostComment(Request $request){


        $Comment=new Comment();
        $Comment->PostId=$request->input('PostId');
        $Comment->UserId=$request->input('Text');
        $Comment->UserName=$request->input('UserName');
        $Comment->UserId=$request->input('UserId');
        $Comment->Comment=$request->input('Comment');
        $Comment->save();

        $postid=$request->input('PostId');


        $post = DB::table('post')
            ->where('id', '=', $postid)
            ->select('post.Heading', 'post.Text', 'post.UserName', 'post.UserId', 'post.created_at','post.id')
            ->get();

        $comment = DB::table('Comment')
            ->where('PostId', '=', $postid)
            ->select('Comment.PostId', 'Comment.UserId', 'Comment.UserName', 'Comment.Comment', 'Comment.created_at')
            ->get();


        /*  $users = DB::table('mobile_user')
              ->join('messages','mobile_user.UserId', '=','messages.SenderId')
              ->select('messages.SenderName','mobile_user.ChatRoomStatus','messages.ChatroomId','messages.SenderId')
              ->where('ChatroomId','=',$id)
              ->distinct()
              ->get();
*/


        return view('postpage', ['post' => $post, 'comment' => $comment]);


    }

}
