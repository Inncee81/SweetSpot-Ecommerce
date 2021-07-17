@section('footer')

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">SweetSpot</a>.</strong> Toate drepturile rezervate.
  </footer>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/dashboard_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('public/dashboard_assets/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/dashboard_assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dashboard_assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/dashboard_assets/dist/js/pages/dashboard3.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Summernot -->
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()
  })
</script>

<!-- DataTables  & Plugins -->
<script src="{{asset('public/dashboard_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/dashboard_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
</body>
</html>

<!-- Page specific script -->
<script>

$(function () {
 // plugin DataTable pentru pagination, searching in tabele, etc
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

@endsection('footer')