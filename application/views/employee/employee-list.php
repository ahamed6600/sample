<?php $this->load->view('employee/header/admin-header') ?>
<?php $this->load->view('employee/sidebar/admin-sidebar') ?>
<?php $this->load->view('employee/navbar/admin-navbar') ?>


  <div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add via CSV</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?= base_url() ?>import_employee" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-lg-2">
                    <select name="column1" class="form-control">
                      <option value="" hidden>Column 1</option>
                      <option value="employee_code">employee_code</option>
                      <option value="employee_name">employee_name</option>
                      <option value="department">department</option>
                      <option value="age">age</option>
                      <option value="experience">experience</option>
                      <option value="date_of_birth">date_of_birth</option>
                      <option value="join_date">join_date</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <select name="column2" class="form-control">
                      <option value="" hidden>Column 2</option>
                      <option value="employee_code">employee_code</option>
                      <option value="employee_name">employee_name</option>
                      <option value="department">department</option>
                      <option value="age">age</option>
                      <option value="experience">experience</option>
                      <option value="date_of_birth">date_of_birth</option>
                      <option value="join_date">join_date</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <select name="column3" class="form-control">
                      <option value="" hidden>Column 3</option>
                      <option value="employee_code">employee_code</option>
                      <option value="employee_name">employee_name</option>
                      <option value="department">department</option>
                      <option value="age">age</option>
                      <option value="experience">experience</option>
                      <option value="date_of_birth">date_of_birth</option>
                      <option value="join_date">join_date</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <select name="column4" class="form-control">
                      <option value="" hidden>Column 4</option>
                      <option value="employee_code">employee_code</option>
                      <option value="employee_name">employee_name</option>
                      <option value="department">department</option>
                      <option value="age">age</option>
                      <option value="experience">experience</option>
                      <option value="date_of_birth">date_of_birth</option>
                      <option value="join_date">join_date</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <select name="column5" class="form-control">
                      <option value="" hidden>Column 5</option>
                      <option value="employee_code">employee_code</option>
                      <option value="employee_name">employee_name</option>
                      <option value="department">department</option>
                      <option value="age">age</option>
                      <option value="experience">experience</option>
                      <option value="date_of_birth">date_of_birth</option>
                      <option value="join_date">join_date</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-10">
                    <input type="file" class="form-control" name="import">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">IMPORT</button>
                </div>
            </div>
        </form>
      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
          Employee
          <a style="float:right" href="<?= base_url() ?>create_employee">Add Employee</a>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Employee Code</th>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Age</th>
                <th>Experience</th>
                <th>DOB</th>
                <th>Joined Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl=1;
               foreach($employees as $val){ ?>
                <tr>
                  <td><?= $sl++;?></td>
                  <td><a href="<?= base_url();?>edit-employee?empcode=<?= $val->employee_code ?>"><?= $val->employee_code  ?></a></td>
                  
                  <td><?= $val->employee_name?></td>
                  <td><?= $val->department?></td>
                  <td><?= $val->age?></td>
                  <td><?= $val->experience?></td>  
                  <td><?= $val->date_of_birth?></td>
                  <td><?= $val->join_date?></td>
                  <td>
                    <button onclick="delete_employee(<?= $val->id?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
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
      function delete_employee(id)
      {
          var del = confirm('Are you sure?')
          if(del)
          {
              window.location = "<?= base_url()?>deleteemployee?id="+id;
          }
      }
  </script>
</body>
</html>
