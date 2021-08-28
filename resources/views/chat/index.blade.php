@extends('layouts.app-dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Recent</h4>
                                </div>
                                <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar" placeholder="Search">
                                        <span class="input-group-addon">
                                            <button type="button"> <i class="fas fa-search"></i>
                                            </button>
                                        </span> </div>
                                </div>
                            </div>
                            <div class="inbox_chat">
                                <div class="chat_list active_chat">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img
                                                src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                        </div>
                                        @foreach ($users as $user)
                                        <div class="chat_ib">
                                            <h5>{{ $user->sender->name }} <span class="chat_date">Dec 25</span></h5>
                                            <p>{{ $user->sender->chats[0]->message }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mesgs">
                            <div class="msg_history">
                                @foreach ($chats as $chat)
                                @if ($chat->sender_id == \Auth::id())
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $chat->message }}</p>
                                        <span class="time_date"> {{ $chat->created_at }}</span>
                                    </div>
                                </div>
                                @else
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $chat->message }}</p>
                                            <span class="time_date"> 11:01 AM | June 9</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <form action="{{ route('chat.store') }}" method="post">
                                        @csrf
                                        <input type="text" class="write_msg" placeholder="Type a message"
                                            name="message" />
                                        <button class="msg_send_btn" type="submit"><i
                                                class="fab fa-telegram-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
