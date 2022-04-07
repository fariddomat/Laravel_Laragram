<div class="post-popup share-post">
    <div class="post-project">
        <h3>@lang('site.share') @lang('site.post')</h3>
        <div class="post-project-fields">
            <form action="{{ route('posts.share') }}" method="Post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-12">
                        @include('home.layouts._error')
                    </div>
                    <div class="col-lg-12">
                        <p class="pcontent" style="padding: 15px 5px;
                        border: 1px dashed;
                        border-radius: 15px;
                        margin-bottom: 10px;"></p>
                        <input type="hidden" name="post_id" id="post_id">
                    </div>
                    <div class="col-lg-12">
                        <textarea class="summernote" name="content" placeholder="Add Your comment Here !"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">@lang('site.share')</button></li>
                            <li><a href="{{url()->previous()}}" title="">@lang('site.cancel')</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
