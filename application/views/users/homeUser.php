	<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Pilih Pelangan</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>Note: kalau bukan pelanggan di kosongi saja<p/>
    								<div class="form-group">
	                  <label>Pilih kategori</label>
	                  <select class="form-control select2 pelanggan" style="width: 100%;">
	                
	                    
	                  </select>
	                </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary delete-storage" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary buy">Buy</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="container">
					<div style="margin-left: 5px;" class="row">
	              <div class="col-6 col-sm-6">
	                <div class="form-group">
	                  <label>Pilih kategori</label>
	                  <select class="form-control select2 kategori" style="width: 100%;">
	                
	                    
	                  </select>
	                </div>
	                <!-- /.form-group -->
	              </div>
	            </div>
            </div>


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row card-list">

        
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url()?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>template/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>template/plugins/select2/js/select2.full.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


	get_produk(1)
	get_kategory()
	filter_kategori()
	process_buy()
	pelanggan()


	function filter_kategori(){
		$('.kategori').on('change', function() {
		  get_produk($(this).val())
		});
	}

	function pelanggan() {
		$.ajax({
		 		type: "GET",
        url: '<?php echo $this->config->item('URL_API') ?>pelanggan',
        dataType: "json",
		    crossDomain: true,
		    contentType: "application/json; charset=utf-8",
		 
		    cache: false,
		    beforeSend: function (xhr) {
		        /* Authorization header */
		        xhr.setRequestHeader("Authorization", localStorage.getItem("token"));
		     
		    },
        success: function (response) {
        	let body = "";
        	body += `<option value="0">pilih pelanggan</option>`;
        	response.data.map(function(element){
						    body += `<option value="${element.id_pelanggan}">${element.nama_pelanggan}</option>`;
						})
           $('.pelanggan').html(body)
        }
    });

	}


	function process_buy() {
			$('.buy').on('click',function(){
	
					
					$.ajax({
								contentType: "application/json; charset=utf-8",
								method: "POST",
								dataType: "json",
							  url: "<?php echo $this->config->item('URL_API') ?>penjualan",
							  data: {
										'id_produk': $('.id_produk').val(),
										'id': localStorage.getItem("id_user"),
										'id_pelanggan' : $('.pelanggan').val()
									},
							  
							  beforeSend: function (xhr) {
						        /* Authorization header */
						        xhr.setRequestHeader("Authorization", localStorage.getItem("token"));
						     
						    },

							  success: function (response) {
					        	Swal.fire({
												  title: 'Berhasil',
												  text: "Transaksi Berhasil",
												  icon: 'success',
												  confirmButtonColor: '#3085d6',
												  confirmButtonText: 'Yes'
												}).then((result) => {
												  if (result.isConfirmed) {
												    	window.location.reload(true);
												  }
												})
					        },error: function(data){
        						console.log(data)
      }
							})
			})
	}


	function get_kategory(){
		$.ajax({
		 		type: "GET",
        url: '<?php echo $this->config->item('URL_API') ?>kategori',
        dataType: "json",
		    crossDomain: true,
		    contentType: "application/json; charset=utf-8",
		 
		    cache: false,
		    beforeSend: function (xhr) {
		        /* Authorization header */
		        xhr.setRequestHeader("Authorization", localStorage.getItem("token"));
		     
		    },
        success: function (response) {
        	let body = "";
        	response.data.map(function(element){
						    body += `<option value="${element.id_kategori}">${element.nama_kategori}</option>`;
						})
           $('.kategori').html(body)
        }
    });

	}

function get_produk(kategori){

		$.ajax({
		 		type: "GET",
        url: `<?php echo $this->config->item('URL_API') ?>produk/${kategori}?page=`,
        dataType: "json",
		    crossDomain: true,
		    contentType: "application/json; charset=utf-8",
		 
		    cache: false,
		    beforeSend: function (xhr) {
		        /* Authorization header */
		        xhr.setRequestHeader("Authorization", localStorage.getItem("token"));
		     
		    },
        success: function (response) {
        	let body = "";
        	response.data.map(function(element){
						    body +=
						    ` 
						    <div style="margin-left: 12px;" class="col-lg-3">
							    <div class="card" style="width: 18rem;">
											  <img class="card-img-top" src="" alt="Card image cap">
											  	<div class="card-body">
											    	<p class="card-text">${element.diskripsi}</p>
											    	
											    <button onclick="show_modal(${element.produk_id})" class="btn btn-primary" type="button" >
													 Beli
												</button>
											  </div>
											</div>
									</div>`;
						})
        	
           $('.card-list').html(body)
        }
    });
	
}


function show_modal(id_produk){
	$('#exampleModal').modal('show');
	$('.id_produk').val(id_produk)
}

		$('.select2').select2()
</script>
</body>
</html>

