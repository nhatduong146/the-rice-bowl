<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\User; //sử dụng model Login

class SocialController extends Controller
{
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    // 'username', 'email', 'password', 'phone',
    //     'fullName', 'dob', 'houseNumber', 'street',
    //     'villageId', 'roleId'
    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_userID',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = User::where('id',$account->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/admin/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hang = new Social([
                'provider_userID' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = User::where('email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'username' => '',
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'phone' => '',
                    'fullName' => $provider->getName(),
                    'dob' => '',
                    'houseNumber' => '',
                    'street' => '',
                    'villageId' => '',
                    'roleId' => '2',
                ]);
            }
            $hang->login()->associate($orang);
            $hang->save();

            $account_name = User::where('id',$account->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/admin/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

}
