@extends('admin_panel_layout')

@section('title', 'Mesajlar')

@section('form')<br><br><br>
<div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="card col-md-6 direct-chat direct-chat-primary" style="height: 100%;">
        <div class="card-header">
            <h3 class="card-title">Chat</h3>
        </div>
        <div class="card-body">
            @php
                $me = intval(Auth::user()->id) % 8;
                $sender_email = null;
                $sender_id = null;
            @endphp
            <div class="direct-chat-messages" style="height: 100%;">
                @foreach ($messages as $message)
                    @if ($message->sender_id != Auth::user()->id)
                        @php
                            $sender_email = $conversations->firstWhere('sender_id', $message->sender_id)->sender_email ?? 'Unknown';
                            $notme = intval($message->sender_id) % 8;
                            $sender_id = $message->sender_id;
                        @endphp
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $sender_email }}</span>
                                <span class="direct-chat-timestamp float-right">{{ $message->created_at }}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('dist/img/user' . $notme . '-128x128.jpg') }}" alt="message user image">
                            <div class="direct-chat-text">
                                {{ $message->message }}
                            </div>
                        </div>
                    @else
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ Auth::user()->email }}</span>
                                <span class="direct-chat-timestamp float-left">{{ $message->created_at }}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('dist/img/user' . $me . '-128x128.jpg') }}" alt="message user image">
                            <div class="direct-chat-text">
                                {{ $message->message }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('messageChat.post') }}" method="post">
                @csrf
                <div class="input-group">
                    <input name="message" placeholder="Mesaj yaz..." class="form-control">
                    <input name="sender_id" value="{{ Auth::user()->id }}" hidden>
                    <input name="receiver_id" value="{{ $sender_id ?? '' }}" hidden>
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <script>
        const messagesDiv = document.querySelector('.direct-chat-messages');
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    </script>
</div>
@endsection
