<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiMessage;
    /*
        == Login function ==
        == Receive email & password  ==
    */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        // == begin attempt ==
        if (Auth::guard()->attempt($data)) {
            if (Auth::user()->level != "4") {
                return $this->returnMessage(false, 'عفوا , لا يمكنك الدخول لهذه الصفحة ', 200);
            }
            // == Create Token ==
            $token = Auth::guard()->user()->createToken('Token')->accessToken;
            //  == return user data with token ==
            // return $this->returnData('user', Auth::guard('agents')->user(), $token);
            return $this->returnData('user', Auth::guard()->user(), $token);
        } else
            // == there is error ==
            return $this->returnMessage(false, 'عفوا , هناك خطأ في كلمة المرور او  اسم المستخدم ', 200);
        // == end attempt ==
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
            'name'  => 'required',
            'level' => ''
        ]);


        $data['password']   = Hash::make($request->password);
        $data['level']       = '4';
        $user = User::create($data);

        //
        $token = $user->createToken('Token')->accessToken;

        return $this->returnData('user', $user, $token);




        //
        // return $this->login(request());
    }

    public function profile(Request $request)
    {
        $data = $request->validate([
            'email'     => 'required',
            // 'password'  => 'required',
            'name'  => 'required',
            'level' => ''
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();

        return $this->returnData('user', $user);
    }
}