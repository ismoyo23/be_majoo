    <!-- modal -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div style="margin-top: 12px;" class="card">
              
              <div class="card-header">

                <h3 class="card-title">Master Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="table-gridjs"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url()?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {


     new gridjs.Grid({
     
      columns: ['Nama Produk', 'Harga', 'Penjual', 'Tanggal'],
      
      server: {
        url: "<?php echo $this->config->item('URL_API') ?>penjualan/perProduk",
         headers: new Headers({
        'Authorization': localStorage.getItem("token"), 
        'Content-Type': 'application/x-www-form-urlencoded'
    }), 
        then: data => data.data.map(res => [
              res.name_produk, res.harga, res.email, Date(res.created_at)
              ]),
        total: data => data.count,

        
      },



    }).render(document.getElementById("table-gridjs"));


  

    if(localStorage.getItem("email") == null){
        location.href = '<?php echo base_url() ?>Home/login';
    }

    let term_email = `<p>${localStorage.getItem("email")}</p>`
    $('.email_account').html(term_email)

  });
</script>
</body>
</html>
