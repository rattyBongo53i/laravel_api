<?php

namespace App\Http\Controllers\Api;
use App\Mail\UserInfo;
use App\Mail\Portfolio;
use App\Mail\WobengMail;
use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\UserData;
use App\Models\Wodbeng;
use App\Models\Printers;
use App\Models\Employee;
// use App\Models\portfolio;
use App\Mail\SendMessageMail;

use DB;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Role as JetstreamRole;
use Laravel\Jetstream\Rules\Role as RulesRole;
use Laravel\Ui\Presets\React;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class MailController extends Controller
{

    //create mailgun smtp send mail function
    public function userAddress(Request $request){
        $user = [
            'name' => 'Yeboah',
            'status' => true
        ];

        $send= Mail::send('email.mail', compact('user'), function($message)
        {
            $message->from('postmaster@codjsoft.tech');
            $message->to('yeboah.determined.isaac@gmail.com');
            $message->subject('Testing Mailgun');
            // $message->body('Testing Mailgun');
        });


        return response()->json(["success" =>"email sent successfully"]);
    }

        public function sendRoyalEmail(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email', // recipient email
            'subject' => 'required|string', // email subject
            'message' => 'required|string', // email body
        ]);

        // Send email
        Mail::to($validatedData['email'])->send(new SendMessageMail($validatedData['message'], $validatedData['subject']));

        // Return success response
        return response()->json(['message' => 'Email sent successfully!'], 200);
    }


//     public function sendMail(){
//         $user = [
//             'name' => 'Yeboah',
//             'status' => true
//         ];
//        $send = Mail::send('email.mail', compact('user'), function($message){

//             $message
//             ->to('royalstreams2019@gmail.com')
//             ->from('no-reply@codjsoft.tech')
//             ->subject('TEST');
//         });


//         return response()->json(["success" =>"email sent successfully"]);


//     }
//     public function markdown(Request $request){

//         $user_ip =  $request->user_ip;


//         $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $user_ip));
//         if ($query && $query['status'] == 'success') {
//         $isp = $query['isp'];
//         $country =  $query['country'];
//         $city = $query['city'];
//         $regionName = $query['regionName'];
//         $zip = $query['zip'];
//         $timezone = $query['timezone'];
//         $countryCode= $query['countryCode'];
//         $user = [
//             'name' => 'Yeboah',
//             "country" => $country,
//             "city" => $city,
//             "isp" => $isp,

//             'status' => true
//         ];

//         $UserData = new UserData();
//         $UserData->user_cookie_id = 1.23456;
//         $UserData->city = $city;
//         $UserData->user_isp = $isp;
//         $UserData->user_ip = $user_ip;
//         $UserData->country = $country;
//         $UserData->extra1 = $regionName;
//         // $UserData->user_browser = $request->user_browser;
//         // $UserData->user_os = $request->user_os;
//         // $UserData->user_device = $request->user_device;
//         // $UserData->user_browser_version = $request->user_browser_version;
//         // $UserData->user_os_version = $request->user_os_version;

//         $UserData->save();
//         // return $UserData;



//     }

//     Mail::to('yeboah.determined.isaac@gmail.com')->send(new UserInfo($user));
//     return response()->json(["success" =>"email sent successfully"]);

//     }

//     public function user_data(Request $request){
//         $user_ip =  $request->user_ip;


//         $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $user_ip));
//         if ($query && $query['status'] == 'success') {
//         $isp = $query['isp'];
//         $country =  $query['country'];
//         $city = $query['city'];
//         $regionName = $query['regionName'];
//         $zip = $query['zip'];
//         $timezone = $query['timezone'];
//         $countryCode= $query['countryCode'];

//             return response()->json([
//             "isp" => $isp,
//             "country" => $country,
//             "city" => $city,
//             "regionName" => $regionName,
//             "countryCode" => $countryCode,
//             "timezone" => $timezone,
//             "zip" => $zip,

//         ]);
//     }

//     // return response()->json(["failed" => "this ip can't be access".$user_ip]);
//     return response()->json([$user_ip]);

//     }


//     public function siteVisitors(){

//         $visitors = UserData::where('id', '>', 0,)
//                                 ->orderBy('id', 'desc')
//                                 ->get();
//         // dd($visitors);
//         return view('visitors', compact('visitors'));

//     }


//     public function portfolioVisitors() {
//         $visitors = wodbeng::where('id', '>', 0,)
//         ->orderBy('id', 'desc')
//         ->get();

//     return view('portfolio', compact('visitors'));
//     // return response()->json($visitors);


// }

//     public function uploadImage(Request $request){

//         $image = $request->croppedImage;
//         $folderPath = 'upload/';

//         $image_parts = explode(";base64,", $image);

//         $image_type_aux = explode("image/", $image_parts[0]);

//         $image_type = $image_type_aux[1];

//         $image_base64 = base64_decode($image_parts[1]);

//         $file = $folderPath . uniqid() . '.png';

//         file_put_contents($file, $image_base64);

//         return response()->json(["success" => "image uploaded successfully" ]);


//     }


//     public function wodbengmail(Request $request){

//         $user_ip =  $request->user_ip;
//         $first_name = $request->fname;
//         $last_name = $request->lname;
//         $email = $request->email;
//         $phone = $request->phone;
//         $subject = $request->subject;
//         $message = $request->message;

//         $data_ = [
//             'first_name' => $first_name,
//             'last_name' => $last_name,
//             'email' => $email,
//             'user_ip' => $user_ip
//         ];

//     // Mail::to('kojo53i@live.com')->send(new UserInfo($user));
//     // return response()->json(["wodbeng mail controller" =>"ready to push email to wodbeng"]);
//     return response()->json($data_);

//     }


//     public function portfolio(Request $request){

//         $user_ip =  $request->user_ip;


//         $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $user_ip));
//         if ($query && $query['status'] == 'success') {
//         $isp = $query['isp'];
//         $country =  $query['country'];
//         $city = $query['city'];
//         $regionName = $query['regionName'];
//         $zip = $query['zip'];
//         $timezone = $query['timezone'];
//         $countryCode= $query['countryCode'];
//         $user = [
//             'name' => 'Yeboah',
//             "country" => $country,
//             "city" => $city,
//             "isp" => $isp,

//             'status' => true
//         ];

//         $UserData = new wodbeng();
//         $UserData->user_cookie_id = 1.23456;
//         $UserData->city = $city;
//         $UserData->user_isp = $isp;
//         $UserData->user_ip = $user_ip;
//         $UserData->country = $country;
//         $UserData->extra1 = $regionName;

//         $UserData->save();
//         // return $UserData;



//     }

//     Mail::to('yeboah.determined.isaac@gmail.com')->send(new Portfolio($user));
//     return response()->json(["success" =>"email sent successfully"]);

//     }

//     public function codjoVisitorDelete($id){

//         $visitor = UserData::find($id);
//         $visitor->delete();
//         if($visitor){
//             // session()->flash('success',
//         return redirect()->route('data-dashboard')->with('success', 'visitor deleted successfully');
//         }
//     }

//     public function portfolioVisitor($id){

//         $visitor = wodbeng::find($id);
//         $visitor->delete();
//         // flash message
//         if($visitor){
//             return redirect()->route('portfolio-visitors')->with('visitor deleted successfully');
//         }
//     }

//     public function deleteMultiple(){

//         $affected = DB::delete('delete from user_data where user_isp = ?', ['Vodafone Ghana MBB']);
//         //return response()->json(["success" => "deleted successfully", "affected" => $affected]);
//         return redirect()->route('data-dashboard')->with('success', 'deleted successfully');
//     }

//     public function printer (Request $request){
//         $printer = new Printers();
//         $printer->name = $request->name;
//         $printer->save();
//         return $printer;
//     }

//     //view all printers
//     public function viewPrinters(){
//         $printers = Printers::all();
//         return view('printers', compact('printers'));
//     }

//     public function employer($id){
//         $employer = Employer::where('id', $id)->with('employees')->get();
//          return view('ordable.employer', compact('employer'));

//     }
}