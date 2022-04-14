<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">2022 &copy; Copyright <a class="text-bold-800 grey darken-2"
                href="/" target="_blank">UOK</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="" target="_blank">
                    info</a></li>

        </ul>
    </div>
</footer>

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="{{ asset('admin/js/jquery.js') }}"></script>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('admin/theme-assets/vendors/js/vendors.min.js') }}">
</script>
{{-- <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('admin/theme-assets/vendors/js/charts/chartist.min.js') }}" defer type="text/javascript">
</script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CHAMELEON  JS-->
<script src="{{ asset('admin/theme-assets/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/theme-assets/js/core/app-lite.js') }}" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{-- <script src="{{ asset('admin/theme-assets/js/scripts/pages/dashboard-lite.js') }}"  type="text/javascript"></script> --}}
<!-- END PAGE LEVEL JS-->
{{-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script> --}}
<script src="{{ asset('admin/js/jquery2.dataTables.min.js') }}" defer></script>
{{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script> --}}
<script src="{{ asset('admin/js/jquery.validate.js') }}" defer></script>
{{-- <script src="http://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script> --}}
<script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}" defer></script>
{{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js" defer></script> --}}
<script src="{{ asset('admin/js/dataTables.buttons.min.js') }}" defer></script>
<script src="/vendor/datatables/buttons.server-side.js" defer></script>

@stack('datatable-scripts')

</body>

</html>
