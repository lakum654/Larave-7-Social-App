<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
   public function viewEdited(Request $request,$id){

   			$result = DB::select('select * from userinfo where user_id = ?',[$id]);
   			return view('edit')->with(['rows'=>$result]);
   }
   public function update(Request $request){

   		$request->validate([   			
   			'profile'=> 'required|image|mimes:jpg,png,jpeg|max:2048',
   		]);

   		$id = $request->id;
   		$username = $request->username;
   		$name = $request->name;   		
   		$profile = $request->profile->getClientOriginalName();
   		$website = $request->website;
   		$bio = $request->bio;
   		$email = $request->email;
   		$phone = $request->phone;
   		$gender = $request->gender;
   		if($request->profile->move(public_path('uploads'),$profile))
   		{
   			 $result = DB::update("UPDATE userinfo SET username = ?,name = ?,profile = ?,website = ?,bio = ?,email = ?,phone = ?,gender = ? where user_id = ?",[$username,$name,$profile,$website,$bio,$email,$phone,$gender,$id]);
   			 if($result == 1){
   			 	return redirect('edit');
   			 }
   			 else{
   			 	return back();
   			 }
   		}			
		
  }
  public function profile(Request $request,$id){

$result = DB::select("SELECT * FROM userinfo WHERE user_id = '$id'");
    $postCount = DB::table('posts')
                ->where(['user_id'=>$id])->count();   
    $allCount = DB::select("SELECT post FROM posts WHERE user_id = '$id' ORDER BY timestamp DESC");
    $followingCount = DB::select("SELECT following FROM following WHERE user_id = '$id'");
    $f = array();
    foreach ($followingCount as $key => $values) {
      foreach ($values as $value) {
        array_push($f, $value);
      }
    }
     $str = implode(',', $f);
     $totalFollowing = strlen($str);
     $totalFollowing = $totalFollowing / 2;
  return view('profile')->with([
  'rows'=>$result,
  'postCount'=>$postCount,
  'allCount'=>$allCount,
  'followingCount'=>$totalFollowing
]);
  }

  public function addPost(Request $request){

  		$request->validate([
  		'post_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
  		]);
  		$user_id = $request->user_id;
  		$post_img = $request->post_img->getClientOriginalName();
  		$post_text = $request->post_text;
  		$like_count = 0;
  		$dislike_count = 0;
  		if($request->post_img->move(public_path('posts'),$post_img)){

  			$result = DB::table('posts')
  					->insert([
  						'user_id'=>$user_id,
  						'post'=>$post_img,
  						'post_text'=>$post_text,
  						'like_count'=>$like_count,
  						'dislike_count'=>$dislike_count
  					]);
  		
  			if($result == 1){
  	
  				return back();
  			}			
  			else{
  				echo "Posts Error";
  			}
  		}
  }

  public function home(Request $request){
  $posts = DB::select("select 
    u.username,
    u.profile,
    p.post,
    p.post_text,
    p.timestamp
    from userinfo u join posts p on u.user_id = p.user_id ORDER BY timestamp DESC");
    return view('home')->with(['posts'=>$posts]);
  }

  public function following()
  {
     
     $logId = session()->get('userId');
      $users =  array();
      $result = DB::select("select following from following where user_id = '$logId'");
      foreach ($result as $key => $values) {
        foreach ($values as $value) {
            array_push($users, $value);
        }
      }
     $followingUsers = implode(',',$users);
      $peoples = DB::select("select * from userinfo");
        return view('peoples')->with(['users'=>$peoples]);
    }
  public function addfollowing(Request $request,$id){
      
      $logId = session()->get('userId');
      $array = array();//3,
      $check = DB::select("SELECT following FROM following WHERE user_id = '$logId'");
      foreach ($check as $key => $values) {
        foreach ($values as $value) {
          array_push($array, $value);
        }
      }
      $string = implode('',$array);
      if(strstr($string,$id) == true)
        {
          return back();
        }
        else
        {
          $new = $string.''.$id;
          $update = DB::update("UPDATE following SET following = '$new,' WHERE user_id = '$logId'");
          return back();
        }
}

}