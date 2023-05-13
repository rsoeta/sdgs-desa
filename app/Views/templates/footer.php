<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- Main Footer -->
<footer class="navbar navbar-expand footer fixed-bottom footer-light">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="btn btn-lg" href="/dashboard">
                <i class="fas fa-home fa-lg"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="btn btn-lg" href="/individu">
                <i class="fas fa-user fa-lg"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="btn btn-lg" href="/keluarga">
                <i class="fas fa-users fa-lg"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="btn btn-lg" href="/setting">
                <i class="fa fa-user-cog fa-lg"></i>
            </a>
        </li>
    </ul>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url(); ?>/dist/plugins/jquery/jquery.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="<?= base_url(); ?>/dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url(); ?>/dist/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.0.0.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script> -->

<!-- ChartJS -->
<script src="<?= base_url(); ?>/dist/plugins/chart.js/Chart.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/dist/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>/dist/js/demo.js"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "searching": true,
            "lengthChange": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "paging": true,
            "ordering": true,
        });
        $('#example3').DataTable({
            "searching": true,
            "lengthChange": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "paging": true,
            "ordering": true,
        });
        $('#example4').DataTable({
            "searching": true,
            "lengthChange": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "paging": true,
            "ordering": true,
        });
    });
</script>

</body>

</html>