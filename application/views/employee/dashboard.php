<?php $this->load->view('backend/header/admin-header') ?>
<?php $this->load->view('backend/sidebar/admin-sidebar') ?>
<?php $this->load->view('backend/navbar/admin-navbar') ?>
<div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <div class="row">
            <?php foreach($categorylisting as $catval){?>
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="<?= base_url()?>admin/products?category=<?= $catval->categoryname?>">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $catval->categoryname?></div>
                          <!--<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $catval->categoryname?></div>-->
                        </div>
                        <div class="col-auto">
                          <img src="<?= base_url()?>uploads/category/<?= $catval->categoryimage?>" width="50px">
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
            <?php }?>
            

            

          </div>


        </div>
        <!-- /.container-fluid -->
          

      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('backend/footer/admin-footer') ?>
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
