<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$topics=Topic::all();
$blocks=Block::all();
        $is_admin=0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;

        }
        return view('topic.index',['topics'=>$topics,'blocks'=>$blocks,'is_admin'=>$is_admin,'id'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic=new Topic;
        return view('topic.create',['topic'=>$topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic=new Topic;
        $topic->topicname=$request->topicnameform;

        if(!$topic->save())
        {
            $err=$topic->getErrors();
            return redirect()->action('TopicController@create')->with('errors',$err)->withInput();
        }
//        try {
//            $topic->save();
//        }catch (\Exception $e){
//
//        }

        return redirect()->action('TopicController@create')->with('message',"New topic $topic->topicname has been added with id $topic->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //выбираем все блоки соответсвующие выбранному топику
        $blocks=  Block::where('topicid',$id)->get();
        //получение всех топиков
        $topics= Topic::all();
        $is_admin=0;
        if (Auth::check())
        {
            $user_id=Auth::id();
           $is_admin=User::find($user_id)->is_admin;

        }else {

        }
           // $topicname=Topic::pluck('topicname','id')->get($id);
        //ILI
        $topicname=Topic::find($id)->topicname;


        return view('topic.index',['topics'=>$topics,'blocks'=>$blocks,'id'=>$id,'topicname'=>$topicname,'is_admin'=>$is_admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $is_admin=0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;


        }
        $search=$request->searchform;
        $search='%'.$search.'%';//поиск по содержимому в любом месте строки
        $topics=Topic::where('topicname','like',$search)->get();//like - sql оператор для поиска совпадений внутри текста

        return view('topic.index',['topics'=>$topics,'is_admin'=>$is_admin,'id'=>0]);
    }

    public function searchB(Request $request){
        $is_admin=0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;


        }
        $search=$request->searchform;
        $search='%'.$search.'%';//поиск по содержимому в любом месте строки
        $blocks=Block::where('title','like',$search)->get();//like - sql оператор для поиска совпадений внутри текста
        return view('topic.index',['blocks'=>$blocks,'is_admin'=>$is_admin,'id'=>0]);
    }

    public function isAdmin(){
        $is_admin=0;
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;


        }
        return view('layouts.app',['is_admin'=>$is_admin]);
    }
}
