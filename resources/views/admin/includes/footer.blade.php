<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © Minia.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- JAVASCRIPT -->
<script>
    @if(Session::has('success'))
    swal({
        title: "SUCCESS",
        text: "{{ Session::get('success') }}",
        icon: "success",
        button: "Ok",
      });
    @endif
    @if(Session::has('error'))
    swal({
        title: "ERROR",
        text: "{{ Session::get('error') }}",
        icon: "error",
        button: "Ok",
      });
    @endif
</script>
<script src="{{asset('contents/dashboard')}}/assets/libs/jquery/jquery.min.js"></script>
{{--  Sweet Alert  --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/node-waves/waves.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/feather-icons/feather.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/pace-js/pace.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/js/pages/dashboard.init.js"></script>
@yield('customjs')
<script src="{{asset('contents/dashboard')}}/assets/js/app.js"></script>
</body>
</html>
