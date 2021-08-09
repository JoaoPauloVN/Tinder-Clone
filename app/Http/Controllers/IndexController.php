<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Db_user;
use App\Models\Db_like;
use App\Models\Db_chat;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class IndexController extends Controller
{
    public function welcome() {
        return view('app.welcome');  
    }

    public function home() {
        $id = session('LoggedUser');        
        $userInfo = Db_user::select('id','name','email','phone','sex','sexual_affinity','visible','age','lat','long','image')->where('id', $id)->first();
        $sex = $userInfo->sex;
        $affinity = $userInfo->sexual_affinity;
        $usersInfo = null;
        if($userInfo->visible != '0') {
            $usersInfo = Db_user::select('id','name','sex','sexual_affinity','age','lat','long','image')->where('visible', '1')->where('id','!=',$userInfo->id)->where('sex', $affinity)->where('sexual_affinity', $sex)->whereNotIn('id', Db_like::where('id_from',$userInfo->id)->get('id_to'))->whereNotIn('id', Db_like::where('id_to',$userInfo->id)->where('action','2')->orwhere('action','0')->get('id_from'))->inRandomOrder()->first();
        }
        $matches =  Db_user::select('id','name','sex','sexual_affinity','age','lat','long','image')->whereIn('id', Db_like::where('id_from',$userInfo->id)->where('action', '2')->get('id_to'))->orWhereIn('id', Db_like::where('id_to',$userInfo->id)->where('action', '2')->get('id_from'))->get();
        $chat = Db_chat::where('user_one',$userInfo->id)->orwhere('user_two', $userInfo->id)->get();
        return view('app.home',['users'=>$usersInfo, 'userInfo'=>$userInfo,'matches'=>$matches, 'chat'=>@$chat]);  
    }
}
