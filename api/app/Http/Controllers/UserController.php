<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Employe;
// use App\Jobs\SendEmailJob;
use App\Mail\SendEmailPassword;
use Mail;

class UserController extends Controller
{

    public function getUsers () {
       $users = Employe::all();
       foreach ($users as $idx=>$user){ 
            $users[$idx]->full_name = json_decode($user['full_name'], true);
            $users[$idx]->phone = json_decode($user['phone'], true);
       }
        return response()->json($users);
    }

    public function editUser (Request $request) {

        try {
            $data = $request->all();
            $fileName = null;
            
            $userInfo = json_decode($data['userEditedInfo']);
            $userId = $userInfo->id;
            $avatarStatus = $request->avatarChangeStatus;
            $user = Employe::find($userId);

            if($request->file && $avatarStatus == 'changed') {
                $fileName = time().'.'.$request->file->extension();
                $request->file->move(public_path('images'), $fileName);
                // $image_path = "/images/filename.ext";  
                // if(File::exists($image_path)) {
                //     File::delete($image_path);
                // }
            }
            if($avatarStatus=='removed'){
                $user->photo = NULL;
            }elseif ($avatarStatus=='changed') {
                $user->photo = $fileName;
            }

            $user->full_name = json_encode($userInfo->full_name);
            $user->phone = json_encode($userInfo->phone);
            $user->role = $userInfo->role?$userInfo->role:$user->role;
            $user->save();

            $user->full_name = json_decode($user['full_name'], true);
            $user->phone = json_decode($user['phone'], true);

            return response()->json(['status' => 'Օգտատերը հաջողությամբ խմբագրված է։', "user" => $user], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ինչ որ բան սխալ է.'], 500);
        }
    
     }

     public function changePassword (Request $request) {
        try {
            $data = $request->all();
            $employeId = auth()->user()->id;
            $employe = Employe::findOrFail($employeId);
            if (Hash::check($data['oldPassword'], $employe['password'])) { 
                $employe->update(['password' => Hash::make($data['newPassword'])]);
                return response()->json(['message' => "Գաղտնաբառը հաջողությամբ փոփոխված է"]);
            }
           
            return response()->json(['message' => "Հին գաղտնաբառը սխալ է մուտքագրված"], 422);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ինչ որ բան սխալ է.'], 500);
        }
     }

     public function getAgent(){
        $agent = Employe::all();
        return response()->json($agent);
     }

     public function getAdminModerator() {
        $agent = Employe::where('role', 'admin')->orWhere('role', 'moderator')->get();
        return response()->json($agent);
     }

     public function getGlobalUser() {
        $globalUser = auth()->user();
        $globalUser->full_name = json_decode($globalUser['full_name'], true);
        $globalUser->phone = json_decode($globalUser['phone'], true);
        return response()->json($globalUser);
     }

     public function changeStatus(Request $request) {
        try {
            $data = $request->all();
            $employe = Employe::where('id', $data['id'])->update(['status' => $data['status']]);

            return response()->json(['message' => "Կարգավիճակը փոփոխված է"]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ինչ որ բան սխալ է.'], 500);
        }
     }

     public function addUser (Request $request) {
        try {
            $data = $request->all();
            $fileName = null;
            $password =  Str::random(10);
            $userInfo = json_decode($data['userInfo']);
            $userEmail = $userInfo->email;
            Mail::send(new SendEmailPassword($userEmail, $password));
            // SendEmailJob::dispatch($userEmail, $password);
            if($request->file) {
                $fileName = time().'.'.$request->file->extension();
                $request->file->move(public_path('images'), $fileName);
            }
            $user = new Employe();
            $user->full_name = json_encode($userInfo->full_name);
            $user->phone = json_encode([]);
            $user->email = $userInfo->email;
            $user->role = $userInfo->role;
            $user->photo = $fileName;
            $user->password = Hash::make($password);
            $user->save();
            return response()->json(['status' => 'success', 'password' => $password], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ինչ որ բան սխալ է.'], 500);
        }
     }
}
