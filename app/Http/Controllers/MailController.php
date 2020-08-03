<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class MailController extends Controller
{
    public function sendPassword(Request $request){

    	$request->validate([

    		'new_password' => 'required|min:6',
    		'new_confirm_password' => 'required|min:6',
            'email' => 'required|email'
    	]);
        $data = array();
        $email = $request->email;    	
    	$password1 = $request->new_password;
        $password2 = $request->new_confirm_password;
    	if($password1 != $password2)
        {
    		$request->session()->flash('message','Passwords are missmatch !! ');
    		return back();
    	}
        else
        {
    		  
    		$checkMail = DB::table('users')
                    ->where(['email'=>$email])->count();
        if($checkMail == 1)
        {
          $updatepass = DB::update("update users set password = ? where email = ?",[$password2,$email]);         
                if($updatepass == 1)
                {                    
                   //Fecth Username or new updated password
                   $result = DB::select('select name,password from users where email = ?',[$email]);
                   foreach($result as $key=>$value){
                        foreach($value as $values){
                            array_push($data,$values);
                        }
                   }
                   $password = "<b>$data[1]</b>";
                   $body = array('name'=>$data[0],"body"=>"According to your reset password request we have change your old password. Your new password is  $password. Please don't share with anyone. ");
                   Mail::send(['html'=>'mail'],$body, function($msg) use($email){

                        $msg->to($email,'Reset Password');
                        $msg->subject('Reset Password');
                        $msg->from('lakummahendra654@gmail.com','www.hello.com');                        
                   }); 
                   $request->session()->flash('message','Your Pasword is sent Successfully.');
                    return redirect('/');

                }
                else
                {
                    $request->session()->flash('message','Passwrod Updated Error..!');
                    return back();
                }
         
        }
        else
        {
             $request->session()->flash('message','Your E-mail Not Registered...');
            return back();
        }       
    }
}


}
