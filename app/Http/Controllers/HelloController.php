<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{
    public function submitData(Request $request){

    	$request->validate([

    		'email'=>'required|email',
    		'username'=>'required',
    		'password'=>'required|min:6'
    	]);
    	
    	$email = $request->email;
    	$username = $request->username;
    	$password = $request->password;
        // $token = $request->_token;

        $checkMail = DB::table('users')
                    ->where(['email'=>$email])->count();
        if($checkMail == 1)
        {
           $request->session()->flash('message','Your E-mail Already Existing.');
           return back();
        }           
        else{
    	$lastId = DB::table('users')
    				->insertGetId([
    					'email'=>$email,
    					'username'=>$username,
    					'password'=>$password,
                        
    				]);
    	if($lastId){
            //Insert some field in userinfo table
            $result = DB::table('userinfo')
            ->insert([
                'user_id' => $lastId,
                'username'=> $username,
                'name' => '',
                'profile' => '1.png',
                'website' =>'',
                'bio'=>'',
                'email' =>$email,
                'phone'=>'',
                'gender'=>''
            ]);
            $result1 = DB::table('following')->insert(['user_id'=>$lastId,'following'=>'']);
            if($result == 1)
            {
                return redirect('/');  
            }             
    	}
        else{
            $request->session()->flash('message','Something Wrong Try Again..');
            return back();
        }
    }
}

    public function login(Request $request){

        $request->validate([

            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $email = $request->email;
        $password = $request->password;

        $data = array();//Here pick the username,email

        $result = DB::select('select id, username,email,password from users where email = ? and password = ?',[$email,$password]);
        foreach($result as $key=>$value){
            foreach($value as $a){
                array_push($data,$a);
            }
        }
        if(count($result) == 1){
        $request->session()->put('userId',$data[0]);
        $request->session()->put('userName',$data[1]);
            return redirect('home');
        }else{
             $request->session()->flash('message','Your E-mail or Password are wrong..');
            return back();
        }
       
    }

    public function destroy(Request $request){

        $request->session()->forget('userName');
        $request->session()->forget('userId');
        $request->session()->flush();    
       return redirect('/');
    }

    
}

