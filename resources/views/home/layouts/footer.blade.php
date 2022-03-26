<script type="text/javascript" src="{{ asset('home/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/script.js') }}"></script>
<script type="text/javascript" src=" {{ asset('home/js/alpine.min.js') }}"></script>

<script type="text/javascript" src=" {{ asset('home/js/jscroll.min.js') }}"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(window).scroll(function() {
        // if ($(window).scrollTop() + $(window).height() > ($(document).height() - 1)) {
            $(function() {
                $('.scrolling-pagination').jscroll({
                    autoTrigger: true,
                    loadingHtml: '<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>',
                    padding: 0,
                    nextSelector: '.pagination li.active + li a',
                    contentSelector: 'div.scrolling-pagination',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            });
            $('ul.pagination').remove();
        // }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            placeholder: 'Type Your Post here',
            tabsize: 2,
            height: 100,
            focus: true
        });
    });
</script>

{{-- Save like --}}
<script>
    $(document).on('click', '#saveLike', function() {
        var _post = $(this).data('post');
        var _type = $(this).data('type');
        var vm = $(this);
        // Run Ajax
        $.ajax({
            url: "{{ url('save-likedislike') }}",
            type: "post",
            dataType: 'json',
            data: {
                post: _post,
                type: _type,
                _token: "{{ csrf_token() }}"
            },
            beforeSend: function() {
                // vm.addClass('disabled');
            },
            success: function(res) {
                if (res.bool == 'like') {
                    vm.addClass('active');
                    // vm.removeAttr('id');
                    var _prevCount = $(".like-count" + _post).text();
                    _prevCount++;
                    // console.log(".like-count" + _post);
                    $(".like-count" + _post).text(_prevCount);
                    $(".like" + _post).text("unlike");

                    _type = 'dislike';
                    document.getElementById("saveLike").setAttribute('data-type', 'dislike');
                } else {

                    vm.removeClass('active');
                    var _prevCount = $(".like-count" + _post).text();
                    _prevCount--;
                    // console.log(".like-count" + _post);
                    $(".like-count" + _post).text(_prevCount);
                    $(".like" + _post).text("like");

                    _type = 'like';
                    document.getElementById("saveLike").setAttribute('data-type', 'like');

                }


            }
        });
    });
    // End
</script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      cssMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>

@stack('lecture-scripts')

{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

