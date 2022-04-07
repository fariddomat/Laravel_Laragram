@foreach ($comments as $comment)
    <div class="display-comment  p-1 rounded">
        @auth
        @if (Auth::user()->hasRole('admin'))
        <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}" class="btn btn-danger" style=" float: right;
                                                    margin-top: 5x;
                                                }"><i class="fa fa-trash"></i> </a>
    @endif
    {{-- @if (Auth::user()->hasRole('user'))
        <a href="{{ route('comment.report', ['id' => $comment->id]) }}" class="btn btn-danger" style=" float: right;
                                                    margin-top: 5px;
                                                }"><i class="fa fa-ban" title="Report this comment"></i> </a>
    @endif --}}
        @endauth
        <div class="row">
            <div class="col-md-1 center">
                <i class="app-menu__icon fa fa-user text-primary" style="font-size: 35px;
            justify-content: center;
            display: grid;
            margin-top: 10px;
            margin-left: 15px;"></i>
            </div>
            <div class="col-md-11">
                <strong class="upper">{{ $comment->user->fullName() }}</strong>
                {{ $comment->created_at->diffForHumans() }}
                <p>{{ $comment->comment }}</p>
            </div>

        </div>

        @if ($comment->replies->count() > 0)
            <div style="margin-left: 75px">
                Replies:
                @include('home.layouts._replies', ['comments' => $comment->replies])
            </div>
        @endif
@if ($post->isFollower($post->user->id) || $post->user_id==Auth::id()  || $post->type !='post')
 @if ($comment->parent_id == null)
            <div style="margin-left: 75px">
                <a href="" id="reply"></a>
                @auth
                    <form method="post" action="{{ route('comment.reply') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post_id }}" />
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                                value="Reply" />
                        </div>
                    </form>
                @endauth
            </div>
        @endif
@endif

        {{-- <hr> --}}

    </div>
@endforeach
