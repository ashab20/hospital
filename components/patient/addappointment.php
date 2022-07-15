<div class="row mt-1 d-none" id="appointment">
    <div class="col-12 ">
        <div class="card w-100 mx-auto">
          <p class="closebtn" id="closebtn"> 
            <i 
            class="mdi mdi-close-circle-outline cursor-pointer text-danger" 
            onclick="$('#appointment').toggleClass('d-none');appointmentBtn.toggleClass('btn-dark');">
           </i>
          </p>
  
  <div class="row card-body justify-content-center">

      <!-- ***** -->
      <?php
          $departmentData =$mysqli->selector('department','*');
          $department = $departmentData['selectdata'];
          if($departmentData['error']){
            $_SESSION['msg']=$departmentData['msg'];
            echo "error";
          }
          $doctorData =$mysqli->find("SELECT name,id FROM user WHERE roles='DOCTOR'");
          $doctors = $doctorData['singledata'];

          
      ?>

      <!-- **** -->

          <form class=" justify-content-center items-center" method="POST" action="<?=$baseurl?>/form/action.php">
          <input type="text" hidden name="patient_id" value="<?= $patientSingleData['singledata']['id'] ?>">
          <input type="text" hidden name="name" value="<?= $patientSingleData['singledata']['name'] ?>">
          <input type="text" hidden name="phone" value="<?= $patientSingleData['singledata']['phone'] ?>">
          <input type="text" hidden name="created_by" value="<?= $usr['id'] ?>">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-md-2 mx-2">
              <label for="gender">Department:</label>
                <select id="department"  name="department_id" class="form-select" onchange="get_doctor(this.value)">
                  <option value="">Department...</option>
              <?php foreach ($department as $dept){?>
                  <option  value="<?=$dept['id'] ?>"><?= $dept['name']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-2 mx-2">
              <label for="depdoctor">Doctor:</label>
                <select id="depdoctor" onchange="get_time(this.value)" name="doctor_id" class="form-select">
                  <option value="">Doctor...</option>
                </select>
              </div>
              <div class="form-group col-md-2 mx-2">
                <label for="date">Date:</label>
                <input type="date"  name="date" min="<?=date('Y-m-d') ?>" required class="form-select p-1">
              </div>
             

            </div>
            <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2 mx-2">
              <label for="time">Time:</label>
              <input type="time" name='time' class="form-control">
              <small>  <p id='time'></p></small>
              </div>
              <div class="form-group col-md-2 mx-2">
              <label for="fees">Consultancy Fees:</label>
              <input class="form-control m-1" type="text" name="visit_fees" readonly id='fees'>
              </div>
            </div>
            <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-9 mx-2">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                          </div>
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary"  name="appt">Make Appointment</button>
            </div>
          </form>

          </div>
        </div>
    </div>
</div>

<script>

	function get_doctor(dep){
		$.ajax({
            url: '../form/data.php?department='+dep,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#depdoctor').html(JSON.stringify(data));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}

  alert(get_time(shift))
	function get_time(shift){
		$.ajax({
            url: '../form/data.php?time='+shift,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {  
                $('#time').html(JSON.stringify(data["time"]));
                $('#fees').val(JSON.stringify(data['fees']));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}
	function get_rate(rate){
		$.ajax({
            url: '../form/data.php?time='+rate,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#rate').html(JSON.stringify(data));
            },error: function(xhr, status, errorMessage) {
			}
        });
	}
</script>