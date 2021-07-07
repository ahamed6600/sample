<?php $this->load->view('employee/header/admin-header') ?>
<?php $this->load->view('employee/sidebar/admin-sidebar') ?>
<?php $this->load->view('employee/navbar/admin-navbar') ?>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?= base_url() ?>createemployee">
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Employee Code</label>
                    <input type="text" class="form-control" name="employee_code" placeholder="Enter Employee Code" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Employee Name</label>
                    <input type="text" class="form-control" name="employee_name" placeholder="Enter Employee Name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Department</label>
                    <input type="text" class="form-control" name="department" placeholder="Enter Department" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Age</label>
                    <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Experience in Organisation</label>
                    <input type="text" class="form-control" name="experience" placeholder="Enter Experience in Organisation" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">DOB</label>
                    <input type="date" class="form-control" name="date_of_birth" placeholder="Enter Department" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Joined Date</label>
                    <input type="date" class="form-control" name="join_date" placeholder="Enter Department" required>
                </div>
            </div>
            
            <center>
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </center>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php $this->load->view('employee/footer/admin-footer') ?>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>
  
  <script>
  $(document).ready(function(){
      $('#offersection').hide();
        $('input[type="checkbox"]').click(function(){
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
        });
        
  })
        
  </script>
</body>
</html>
