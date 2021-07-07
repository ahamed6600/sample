<?php $this->load->view('employee/header/admin-header') ?>
<?php $this->load->view('employee/sidebar/admin-sidebar') ?>
<?php $this->load->view('employee/navbar/admin-navbar') ?>
    <div class="container-fluid">
          <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">-->
            <!--<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          <!--</div>-->
          <!--<div class="row">-->
          <!--<div class="col-lg-6">-->
          <h6>Steps to update the product price:</h6>
          <ul>
              <li>Export the file.</li>
              <li>Change the price of the product which you wish to update.</li>
              <li>Save the complete list in ".CSV" format.</li>
              <li>Click on "Browse" select the file to upload and click import.</li>
          </ul>
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Import</h6>
              </div>
              <div class="card-body">
                <form method="post" action="<?= base_url() ?>admin/import" enctype="multipart/form-data">
                    <div class="form-row">
                        
                        <div class="form-group col-lg-8">
                            <input type="file" class="form-control" name="import" required>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">IMPORT</button>
                        </div>
                    </div>
                    
                      
                </form>
                
              </div>
              
            </div>
            
          <!--<div class="col-lg-6"> -->
            <div class="card shadow mb-4">
              <div class="card-body">
                
                    <div class="form-row">
                        
                        <div class="form-group">
                            <label>
                            To export, click this button 
                        </label>        
                            <a href="<?= base_url()?>admin/exportdata" class="btn btn-primary">EXPORT</a>
                        </div>
                        
                        
                        
                    </div>
                    <center>
                      
                    </center>
                
              </div>
            </div>
          <!--</div>  -->
          <!--</div>-->
    </div>
        <!-- /.container-fluid -->
          

      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('employee/footer/admin-footer') ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>

</body>

</html>
