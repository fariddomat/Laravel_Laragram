<div class="chatbox-list">
    <div class="chatbox">
        <div class="chat-mg bx">
            <a href="#" title=""><img src="{{ asset('home/images/chat.png') }}" alt=""></a>
            {{-- <span>2</span> --}}
        </div>
        <div class="conversation-box">
            <div class="con-title">
                <h3>Messages</h3>
                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
            </div>
            <div class="chat-list">
                @if(Auth::user()->chats()->count() > 0)
                @foreach (Auth::user()->chats() as $item)
                   <a href="{{ route('private') }}">
                    <div class="conv-list">
                        <div class="usrr-pic">
                            <img src="{{$item->info->profile_img_path}}" style="max-width: 50px;
                            max-height: 50px;" alt="">
                            <span class="active-status"></span>
                        </div>
                        <div class="usy-info">
                            <h3>{{$item->username}}</h3>
                            @isset(Auth::user()->chat($item)->message)
                                <span>{{Auth::user()->chat($item)->message}}</span>
                            @endisset

                        </div>
                        <div class="ct-time">
                            @isset (Auth::user()->chat($item)->message)
<span>{{Auth::user()->chat($item)->created_at->diffforhumans()}}</span>
                            @endisset

                        </div>
                    </div>
                   </a>
                @endforeach
                @endif
            </div>
            <!--chat-list end-->
        </div>
        <!--conversation-box end-->
    </div>
</div>
<!--chatbox-list end-->
