<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

@if(session('order_notification'))
    <script>
        // Sử dụng NotyJS để hiển thị thông báo
        new Noty({
            text: "{{ session('order_notification') }}",
            type: 'success'
        }).show();
    </script>
    @if(Session::has('order_notification'))
        <?php Session::forget('order_notification');   ?>
    @endif
@endif


<script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('admin/js/feather.min.js')}}"></script>

<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/js/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/js/chart-data.js')}}"></script>

<script src="{{asset('admin/js/script.js')}}"></script>

<script src="{{asset('admin/js/jquery-ui.min.js')}}"></script>
<!-- preloading animation -->
<script src="{{asset('site/js/main.js')}}"></script>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
<script nomodule src="https://unpkg.com/browse/ionicons@4.2.4/dist/ionicons.js"> </script>

</html>