<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use App\Models\Printers;
use Illuminate\Http\Request;
use App\Mail\UserInfo;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
    public function sendMail(Request $request){
        
       // sending eUserData

       Mail::to('isaac@live.com')->send(new UserInfo());
    //    return new UserInfo();

/*
     
        */
        //save
        $UserData = new UserData();
        $UserData->user_cookie_id = $request->user_cookie_id;
        $UserData->city = $request->city;
        $UserData->user_isp = $request->user_isp;
        $UserData->user_ip = $_SERVER['REMOTE_ADDR'];
        $UserData->country = $request->country;
        // $UserData->user_browser = $request->user_browser;
        // $UserData->user_os = $request->user_os;
        // $UserData->user_device = $request->user_device;
        // $UserData->user_browser_version = $request->user_browser_version;
        // $UserData->user_os_version = $request->user_os_version;
  
        $UserData->save();
        return $UserData;
        

    }
    public function rawmail(){
        $msg="";

        $from =     "clcp.hostinger.com	";  // UserData.post.000webhost.com
        $headers  = "From: $from\r\n"; 
        $headers .= "Content-type: text/html\r\n";
        $eUserData= "yeboah.determined.isaac@gUserData.com";
        $user_ip_address = $_SERVER['REMOTE_ADDR'];
     
 
        $date = date("Y-m-d h:i:sa"); 
        $msg .= "new user is from here ";
       // $msg .= 'new user is from '.$request->country.', '."\n".' in '.$request->city.' '."\n".' using '.$request->isp.' '."\n".' on '.$date.' '."\n".'  with this ip '.$user_ip_address.'';
        $msg = wordwrap($msg,150);
        // send eUserData
        mail($eUserData,"New user time ", $msg ,$headers);

    }

    public function mailgun(){
       return Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->subject('Mailgun and Laravel are awesome!');
            $message->from('no-reply@codjosoft.tech', 'codjosft Name');
            $message->to('kojo53i@live.com');
        });
    }

    public function index(){
        $user = "kojo Yeboahr";

	    Mail::send('mailView', $user, function($message) use ($user) {
	        $message->to($user['email']);
	        $message->subject('Testing Mailgun');
	    });

	    dd('Mail Send Successfully');

    }

 

  
}
