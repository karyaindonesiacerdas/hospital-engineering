<div class="content">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    {{-- wire:poll.60s --}}
                    <div class="messaging" wire:poll.5s>
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Recents</h4>

                                    </div>
                                    {{-- <div class="srch_bar">
                                        <div class="stylish-input-group">
                                            <input type="text" class="search-bar" placeholder="Search">
                                            <span class="input-group-addon">
                                                <button type="button"> <i class="fas fa-search"></i>
                                                </button>
                                            </span> </div>
                                    </div> --}}
                                </div>
                                <div class="inbox_chat">
                                    @foreach ($users as $user)
                                    @if ($isVisitor)
                                    <a href="#" wire:click.prevent="setReceiver({{ $user->id }})">
                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"> <img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>{{ $user->name }} <span
                                                            class="chat_date">{{ $latestChat['created_at'] }}</span>
                                                    </h5>
                                                    <p>{{ $latestChat['message'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @else

                                    <a href="#" wire:click.prevent="setReceiver({{ $user->sender->id }})">
                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"> <img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>{{ $user->sender->name }} <span
                                                            class="chat_date">{{ $latestChat['created_at'] }}</span>
                                                    </h5>
                                                    <p>{{ $latestChat['message'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="mesgs">
                                <div style="height: 550px;">
                                    @if ($receiver_id)
                                    <div class="msg_history">
                                        @foreach ($chats as $chat)
                                        @if ($chat->sender_id == \Auth::id())
                                        <div class="outgoing_msg">
                                            <div class="sent_msg">
                                                <p>{{ $chat->message }}</p>
                                                <span class="time_date"> {{ $chat->created_at }}</span>
                                            </div>
                                        </div>
                                        @if ($chat->image)
                                        <a data-fancybox="gallery" href="{{ asset('storage/photos/' . $chat->image) }}">
                                            <img src="{{ asset('storage/photos/' . $chat->image) }}" width="180"
                                                height="180" class="ml-4 mb-4">
                                        </a>
                                        @endif
                                        @endif
                                        @if ($chat->receiver_id == \Auth::id())
                                        <div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img
                                                    src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                            </div>
                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <p>{{ $chat->message }}</p>
                                                    <span class="time_date"> 11:01 AM | June 9</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($chat->image)
                                        <a data-fancybox="gallery" href="{{ asset('storage/photos/' . $chat->image) }}">
                                            <img src="{{ asset('storage/photos/' . $chat->image) }}" width="180"
                                                height="180" class="ml-4 mb-4">
                                        </a>
                                        @endif
                                        @endif
                                        @endforeach
                                        @if ($photo)
                                        <div class="sent_msg">
                                            <div class="alert alert-dismissible fade show" role="alert">
                                                <img src="{{ $photo->temporaryUrl() }}" width="90" height="90"
                                                    class="ml-4">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close" wire:click="deleteImage">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="type_msg">
                                        <div class="input_msg_write">
                                            <form wire:submit.prevent="store()">
                                                <input type="text" class="write_msg w-100" placeholder="Type a message"
                                                    name="message" wire:model.defer="message" />
                                                @error('message') <span class="error">{{ $message }}</span> @enderror
                                                <button class="file_btn" type="button">
                                                    <label for="file">
                                                        <i class="far fa-file-image" style="cursor: pointer;"></i>
                                                        <input type="file" id="file" style="display: none"
                                                            wire:model="photo" name="image">
                                                    </label>
                                                </button>
                                                @error('photo') <span class="error">{{ $message }}</span> @enderror
                                                <button class="msg_send_btn" type="submit"><i
                                                        class="fab fa-telegram-plane"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @else
                                    <div
                                        class="w-100 text-center d-flex justify-content-center align-items-center h-100">
                                        <img src="{{ asset('dist/img/initial-chat.svg') }}" alt="initial-chat"
                                            class="img-fluid text-center" width="500" height="500">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
