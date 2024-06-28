<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/panel', function () {
        return view('admin_panel');
    })->name('admin_panel');

    Route::get('/user/home', function () {
        return view('user_panel');
    })->name('user_panel');
});
Route::get('/messages', [Controller::class, 'messages'])->name('messages');
Route::post('/messages', [Controller::class, 'messagesPost'])->name('messages.post');
Route::get('/chat', [Controller::class, 'messageChat'])->name('messageChat');
Route::post('/chat', [Controller::class, 'messageChatPost'])->name('messageChat.post');
Route::post('/homechat', [Controller::class, 'messageChatHomePost'])->name('messageChatHome.post');
Route::get('/usermessages', [Controller::class, 'usermessages'])->name('usermessages');
Route::post('/usermessages', [Controller::class, 'usermessagesPost'])->name('usermessages.post');
Route::get('/userchat', [Controller::class, 'usermessageChat'])->name('usermessageChat');
Route::post('/userchat', [Controller::class, 'usermessageChatPost'])->name('usermessageChat.post');
Route::get('/usershowallannouncements', [Controller::class, 'usershowAllannouncements'])->name('usershowAllannouncements');
Route::get('/home', [Controller::class, 'home'])->name('home');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::get('/adduser', [Controller::class, 'adduser'])->name('adduser');
Route::get('/showallhomes', [Controller::class, 'showAllhomes'])->name('showAllhomes');
Route::get('/addannouncement', [Controller::class, 'addannouncement'])->name('addannouncement');
Route::post('/addannouncement', [Controller::class, 'addannouncementPost'])->name('addannouncement.post');
Route::get('/editlastannouncement', [Controller::class, 'editLastannouncement'])->name('editLastannouncement');
Route::post('/editlastannouncement', [Controller::class, 'editLastannouncementPost'])->name('editLastannouncement.post');
Route::get('/showallannouncements', [Controller::class, 'showAllannouncements'])->name('showAllannouncements');
Route::post('/adduser', [Controller::class, 'adduserPost'])->name('adduser.post');
Route::get('/userupdate', [Controller::class, 'updateuser'])->name('updateuser');
Route::post('/userupdate', [Controller::class, 'updateuserPost'])->name('updateuser.post');
Route::get('/deleteuser', [Controller::class, 'deleteuser'])->name('deleteuser');
Route::post('/deleteuser', [Controller::class, 'deleteuserPost'])->name('deleteuser.post');
Route::get('/showallusers', [Controller::class, 'showAllusers'])->name('showAllusers');
Route::get('/addhome', [Controller::class, 'addhome'])->name('addhome');
Route::post('/addhome', [Controller::class, 'addhomePost'])->name('addhome.post');
Route::get('/homeupdate', [Controller::class, 'updatehome'])->name('updatehome');
Route::post('/homeupdate', [Controller::class, 'updatehomePost'])->name('updatehome.post');
Route::get('/deletehome', [Controller::class, 'deletehome'])->name('deletehome');
Route::post('/deletehome', [Controller::class, 'deletehomePost'])->name('deletehome.post');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/forgot_my_password', [AuthManager::class, 'forgot_my_password'])->name('forgot_my_password');
Route::post('/forgot_my_password', [AuthManager::class, 'forgot_my_passwordPost'])->name('forgot_my_password.post');
