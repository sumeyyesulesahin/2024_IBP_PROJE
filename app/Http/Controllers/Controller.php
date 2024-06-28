<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }

    function editLastannouncement() {
        $Update = Announcement::latest()->first();

        return view('editLastannouncement', compact('Update'));
    }

    function showAllannouncements() {
        $Updates = Announcement::all();

        return view('showAllannouncements', compact('Updates'));
    }

    public function messageChat(Request $request) {
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)
            ->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))
            ->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                    ->where('receiver_id', $userId)
                    ->orWhere(function ($query) use ($conversation, $userId) {
                        $query->where('receiver_id', $conversation->sender_id)
                            ->where('sender_id', $userId);
                    });
            })->orderByDesc('created_at')->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
            $conversation->last_message_time = $lastMessage ? $lastMessage->created_at->diffForHumans() : null;
            $conversation->sender_email = User::find($conversation->sender_id)->email;
        }

        $sender_id = $request->sender_id;

        $messages = Message::where(function ($query) use ($sender_id) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id);
        })->orWhere(function ($query) use ($sender_id) {
            $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messageChat', compact('messages', 'conversations', 'sender_id'));
    }

    function messages(Request $request) {
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)
            ->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))
            ->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                    ->where('receiver_id', $userId)
                    ->orWhere(function ($query) use ($conversation, $userId) {
                        $query->where('receiver_id', $conversation->sender_id)
                            ->where('sender_id', $userId);
                    });
            })->orderByDesc('created_at')->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
            $conversation->last_message_time = $lastMessage ? $lastMessage->created_at->diffForHumans() : null;
            $conversation->sender_email = User::find($conversation->sender_id)->email;
        }

        $sender_id = $request->sender_id;

        $messages = Message::where(function ($query) use ($sender_id) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id);
        })->orWhere(function ($query) use ($sender_id) {
            $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messages', compact('messages', 'conversations', 'sender_id'));
    }

    function registrationPost(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'nullable'
        ]);

        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        if ($request->password == $request->password2) {
            $user = User::create($data);
        } else {
            return redirect(route('registration'))->with('error', 'Şifreler eşleşmiyor');
        }

        if(!$user){
            return redirect(route('registration'))->with('error', 'Kayıt başarısız, tekrar deneyin');
        }
        return redirect(route('login'))->with('success', 'Kayıt işlemi başarıyla tamamlandı');
    }

    function forgot_my_passwordPost(Request $request) {
        $request->validate([
            'email' => 'required|email:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect(route('forgot_my_password'))->withErrors(['email' => 'E-posta adresi bulunamadı.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('login'))->with('success', 'Şifreniz başarıyla sıfırlandı.');
    }

    function adduserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role']
        ]);

        if(!$user){
            return redirect(route('adduser'))->with('error', 'Kullanıcı eklenemedi, tekrar deneyin');
        }
        return redirect(route('adduser'))->with('success', 'Kullanıcı başarıyla eklendi');
    }

    function updateuserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'nullable|string',
            'role' => 'nullable|string',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $updateData = [];
        if (isset($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }
        if (isset($validatedData['role'])) {
            $updateData['role'] = $validatedData['role'];
        }

        $user->update($updateData);

        return redirect(route('updateuser'))->with('success', 'Kullanıcı bilgileri başarıyla güncellendi.');
    }

    function deleteuserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $user->delete();

        return redirect(route('deleteuser'))->with('success', 'Kullanıcı başarıyla silindi.');
    }

    function addhomePost(Request $request) {
        $validatedData = $request->validate([
            'home_name' => 'string',
            'location' => 'string',
            'post_code' => 'string',
            'defination' => 'nullable|string'
        ]);

        $home = Home::create([
            'home_name' => $validatedData['home_name'],
            'location' => $validatedData['location'],
            'post_code' => $validatedData['post_code'],
            'defination' => $validatedData['defination']
        ]);

        if(!$home){
            return redirect(route('addhome'))->with('error', 'Ev kayıt işlemi gerçekleştirilemedi, tekrar deneyiniz');
        }
        return redirect(route('addhome'))->with('success', 'Ev başarıyla kayıt edildi');
    }

    function updatehomePost(Request $request) {
        $validatedData = $request->validate([
            'home_name' => 'string',
            'location' => 'string',
            'post_code' => 'string',
            'defination' => 'nullable|string'
        ]);

        $home = Home::where('home_name', $validatedData['home_name'])->firstOrFail();

        if (is_null($home)) {
            // Eğer home bulunamazsa hata mesajıyla yönlendir
            return redirect(route('updatehome'))->with('error', 'Girdiğiniz Ev sistemde kayıtlı değil.');
        }

        // Güncellenmesi gereken veriler
        $updateData = [
            'location' => $validatedData['location'],
            'post_code' => $validatedData['post_code'],
            'defination' => $validatedData['defination']
        ];

        // home kaydını güncelle
        $home->update($updateData);

        // Başarı mesajıyla yönlendir
        return redirect(route('updatehome'))->with('success', 'Evin bilgileri başarıyla güncellendi.');
    }


    function addannouncementPost(Request $request) {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
            'description' => 'nullable',
        ]);

        $Update = Announcement::create([
            'tittle' => $validatedData['tittle'],
            'content' => $validatedData['content'],
            'description' => $validatedData['description']
        ]);

        if(!$Update){
            return redirect(route('addannouncement'))->with('error', 'Duyuru eklenemedi, tekrar deneyiniz');
        }
        return redirect(route('addannouncement'))->with('success', 'Duyuru başarıyla eklendi');
    }

    function editLastannouncementPost(Request $request) {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
            'description' => 'required',
        ]);

        $announcement = Announcement::latest()->first();

        $updateData = [];

        if (isset($validatedData['tittle'])) {
            $updateData['tittle'] = $validatedData['tittle'];
        }
        if (isset($validatedData['content'])) {
            $updateData['content'] = $validatedData['content'];
        }
        if (isset($validatedData['description'])) {
            $updateData['description'] = $validatedData['description'];
        }

        // if (isNull($announcement)) {
        //     return redirect(route('editLastannouncement'))->with('error', 'Sistemde herhangi bir duyuru bulunamadı');
        // } else {
        $announcement->update($updateData);
        return redirect(route('editLastannouncement'))->with('success', 'Son duyuru başarıyla güncellendi');
        // }
    }

    function messageChatPost(Request $request) {
        $validatedData = $request->validate([
            'message' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);

        $message_sender = $request->sender_id;

        $message = Message::create([
            'message' => $validatedData['message'],
            'sender_id' => $validatedData['sender_id'],
            'receiver_id' => $validatedData['receiver_id']
        ]);
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where('sender_id', $conversation->sender_id)
                ->where('receiver_id', $userId)->orderByDesc('created_at')->first();
            $conversation->last_message_content = $lastMessage->content;
        }

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($conversation, $userId) {
                $query->where('receiver_id', $conversation->sender_id)
                      ->where('sender_id', $userId);
            })
            ->orderByDesc('created_at')
            ->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
        }

        foreach ($conversations as $conversation) {
            $user = User::find($conversation->sender_id);
            $conversation->sender_email = $user->email;

            $lastMessage = Message::where('sender_id', $conversation->sender_id)
                ->where('receiver_id', $userId)
                ->orderByDesc('created_at')
                ->first();

            $conversation->last_message_time = $lastMessage && $lastMessage->created_at ? $lastMessage->created_at->diffForHumans() : null;
        }

        $userId = $request->receiver_id;

        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        // if(!$message){
        //     return redirect(route('messageChat'))->with('error', 'Mesaj iletilemedi, tekrar deneyiniz');
        // }
        if(!(Auth::user()->id == 2)) {
            return view('user_panel');
        } else {
            return view('messageChat', compact('message_sender', 'messages','conversations'));
        }
    }

    function home() {
        return view('home');
    }

    function adduser() {
        return view('adduser');
    }

    function updateuser() {
        return view('updateuser');
    }

    function deleteuser() {
        return view('deleteuser');
    }

    function showAllUsers() {
        $users = User::all();

        return view('showAllUsers', compact('users'));
    }

    function addhome() {
        return view('addhome');
    }

    function updatehome() {
        return view('updatehome');
    }

    function deletehome() {
        return view('deletehome');
    }

    function deletehomePost(Request $request) {
        $validatedData = $request->validate([
            'home_name' => 'required|exists:homes',
        ]);

        $home = Home::where('home_name', $validatedData['home_name'])->firstOrFail();

        $home->delete();

        return redirect(route('deletehome'))->with('success', 'Ev başarıyla silindi.');
    }

    function showAllhomes() {
        $homes = Home::all();

        return view('showAllhomes', compact('homes'));
    }

    function addannouncement() {
        return view('addannouncement');
    }

    function messageChatHomePost(Request $request) {
        $validatedData = $request->validate([
            'message' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);

        Message::create([
            'message' => $validatedData['message'],
            'sender_id' => $validatedData['sender_id'],
            'receiver_id' => $validatedData['receiver_id']
        ]);

        return view('home');
    }

    function homedetails() {
        $homes = Home::all();

        return view('kullanici_home', compact('homes'));
    }
}
