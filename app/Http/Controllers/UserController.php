<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Db_User;
use App\Models\Db_Like;
use App\Models\Db_Chat;
use App\Models\Db_Chat_Message;

class UserController extends Controller
{
    public function registerUser(Request $request) {
        if($request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:db_users',
            'password'=>'required|min:5|max:30',
        ],[
            'name.required'=>'O nome não pode ser vazio',
            'email.required'=>'O email não pode ser vazio',
            'email.email'=>'Insira um email valido',
            'email.unique'=>'Este email ja esta cadastrado, escolha outro',
            'password.required'=>'A senha não pode ser vazia',
            'password.min'=>'A senha deve ter no mínimo 5 Caracteres',
            'password.max'=>'A senha deve ter no maxímo 30 Caracteres'
        ])) {
            $user = new Db_user();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = '';
            $user->password = Hash::make($request->password);
            $user->age = 25;
            $user->lat = 0;
            $user->long = 0;
            $user->image = '';
            $user->visible = '1';

            $user->save();

            $data = [];
            $data['success'] = true;
            die(json_encode($data));
            
        }
    }

    public function ValidateUser(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:20'
        ]);
        $userInfo = Db_user::where('email',$request->email)->first();            
        if(!$userInfo){
            return back()->with('fail','email invalid');
        } else {
            if(Hash::check($request->password,$userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('app');
            } else {
                echo 'error';
                return back()->with('error','password invalid');
            }
        }
        
    }

    public function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    public function UpdateLocation(Request $request) {
        $lat = $request->lat;
        $long = $request->long;
        $id = $request->id;
        Db_user::where('id', $id)
               ->update(['lat' => $lat, 'long'=>$long]);
    }

    public function ActionLikeorNo(Request $request) {
        $data = [];
        if($request->action == '1' || $request->action == '0') {
            if(Db_like::where('id_from', $request->id_to)->where('id_to', $request->id_from)->where('action','1')->count() >= 1){
                Db_like::where('id_from', $request->id_to)->where('id_to', $request->id_from)->update(['action'=>'2']);
                $chat = new Db_chat();
                $chat->user_one = $request->id_from;
                $chat->user_two =  $request->id_to;
                $chat->save();
                $data['success'] = true;
            } else {
                $like = new Db_like();
    
                $like->id_from = $request->id_from;
                $like->id_to = $request->id_to;
                $like->action = $request->action;
    
                if($like->save()){
                    if($request->action == 1) {
                        $data['message'] = 'Voce gostou dessa pessoa, agora so esperar que ele tambem goste de voce';
                    }
                    $data['success'] = true;
                }
            }
        } else if($request->action == 'unmatch') {
            $id_one = $request->id_from;
            $id_two = $request->id_to;
            Db_like::where(function($query) use ($id_one, $id_two){
                $query->where('id_from',$id_one)
                        ->where('id_to', $id_two);
                    })
                        ->orwhere(function($query) use ($id_one, $id_two){
                $query->where('id_from',$id_two)
                        ->where('id_to', $id_one);
                    })  
                        ->update(['action'=>'0']);
            Db_chat::where(function($query) use ($id_one, $id_two){
                $query->where('user_one',$id_one)
                        ->where('user_two', $id_two);
                    })
                        ->orwhere(function($query) use ($id_one, $id_two){
                $query->where('user_one',$id_two)
                        ->where('user_two', $id_one);
                    })  
                        ->delete();
            $data['success'] = true;
        }                       
        die(json_encode($data));
    }
    
    public function getMessages(Request $request) {
        $id_user = $request->id_user;
        $id_chat = $request->id_chat;
        $limit = $request->limit;

        $data = [];
        $data['chat'] = $id_chat;

        if((Db_chat_message::where('id_chat',$id_chat)->count()) > 0){         
            $data['messages'] = Db_chat_message::where('id_chat',$id_chat)->orderBy('id', 'DESC')->limit(40)->get();
        }
        $query = Db_chat::where('id',$id_chat)->first(); 
        if($query['user_one'] == $id_user) {
            $id_user_two = $query['user_two'];
        } else {
            $id_user_two = $query['user_one'];
        }
        $data['user'] = Db_user::select('id','name','age','image')->where('id', $id_user_two)->first();
        die(json_encode($data));
    }

    public function sendMessage(Request $request) {
        $data = [];

        $chat = new Db_Chat_Message;

        $chat->id_chat = $request->id_chat;
        $chat->id_user = $request->id_user;
        $chat->message = $request->message;
        $chat->status = 'NotView';

        if($chat->save())
        $data['success'] = true;

        die(json_encode($data));
    }

    public function updateData(Request $request) {
        $field = $request->field;
        $newContent = $request->newContent;
        $oldContent = $request->oldContent;
        $id = $request->user_id;
        $data = [];
        $data['success'] = true;
        if($field == 'email'){
            if(!filter_var($newContent, FILTER_VALIDATE_EMAIL)) {
                $data['success'] = false;
                $data['content'] = $oldContent;
                $data['message'] = 'This email is invalid! Choose another';
            } else { 
                if(Db_user::where('email', $newContent)->count() > 0){
                    $data['success'] = false;
                    $data['content'] = $oldContent;
                    $data['message'] = 'This email has already been used! Choose another';
                }
            }
        }

        if($data['success']){
            if(Db_user::where('id', $id)->update([$field=>$newContent])) {
                if($newContent == 'Homem' || $newContent == 'Mulher'){ 
                    $userInfo = Db_user::where('id', $id)->first();
                    $data['user'] = Db_user::select('id','name','sex','sexual_affinity','age','lat','long','image') 
                                    ->where('visible', '1')
                                    ->where('id','!=',$userInfo->id)
                                    ->where('sex', $userInfo->sexual_affinity)
                                    ->where('sexual_affinity', $userInfo->sex)
                                    ->whereNotIn('id', Db_like::where('id_from',$userInfo->id)
                                    ->get('id_to'))
                                    ->whereNotIn('id', Db_like::where('id_to',$userInfo->id)->where('action','2')
                                    ->orwhere('action','0')->get('id_from'))
                                    ->inRandomOrder()->first();
                }
                $data['message'] = 'update successfully';
            }
        }
        die(json_encode($data));
    }

    
    public function getUsers(Request $request) {
        $id = $request->id; 
        $userInfo = Db_user::where('id', $id)->first();
        $usersInfo = Db_user::select('id','name','sex','sexual_affinity','age','lat','long','image')->where('visible', '1')->where('id','!=',$userInfo->id)->where('sex', $userInfo->sexual_affinity)->where('sexual_affinity', $userInfo->sex)->whereNotIn('id', Db_like::where('id_from',$userInfo->id)->get('id_to'))->whereNotIn('id', Db_like::where('id_to',$userInfo->id)->where('action','2')->orwhere('action','0')->get('id_from'))->inRandomOrder()->first();
        
        die(json_encode($usersInfo));
    }

    public function updateImage(Request $request) {
        $file = $_FILES['image'];

        $name = Hash::make($file['name'].date('Y-m-d H:i:s'));
        $hash = substr(str_replace('/','',$name),0,25);
        $ext = explode('/',$file['type'])[1];  
        $size = $file['size'];
        $tmp_name = $file['tmp_name'];
        $errors = $file['error'];

        $id = session('LoggedUser');
        
        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        $data['success'] = true;
        if (!in_array($ext, $allowed_image_extension)) {
            $data['message'] = 'Formato de Invalido, use (jpg, jpeg, png)';
            $data['success'] = false;
        }    
        if (($size > 2000000)) {
            $data['message'] = 'Tamanho da image de no maximo 2MB';
            $data['success'] = false;
        }  
        if(empty($errors)==true && $data['success']) {
            if(move_uploaded_file($tmp_name, "assets/app/images/".$hash.'.'.$ext)){
                $old_image = Db_user::where('id', $id)->get('image');
                @unlink("assets/app/images/".$old_image[0]['image']);
                Db_user::where('id', $id)->update(['image'=>$hash.'.'.$ext]);
                $data['name'] = $hash.'.'.$ext;
            }

        }

        die(json_encode($data));
    }
}
