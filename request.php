<?php
require('db.php');
if (isset($_REQUEST['patientname'])) {
    session_start();
    $patientname = stripslashes($_REQUEST['patientname']);
    $patientname = mysqli_real_escape_string($con, $patientname);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($con, $city);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con, $phone);
    $bloodType = stripslashes($_REQUEST['bloodType']);
    $bloodType = mysqli_real_escape_string($con, $bloodType);
    $doctorname = stripslashes($_REQUEST['doctorname']);
    $doctorname = mysqli_real_escape_string($con, $doctorname);
    $query = "INSERT into `request` (patientname, doctorname, city, phone, bloodType, email)
    VALUES ('$patientname', '$doctorname', '$city', '$phone', '$bloodType', '$email')";
    $result = mysqli_query($con, $query);
    if ($result) {
        header("Location: index.php");
    }
} else {
    ?>
    <!-- request blood -->
    <div class="modal fade" id="requestBlood" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Request Blood</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="request" action="request.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="patientname">Patient Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="patientname" type="text" class="form-control" id="validationCustomPatientname" placeholder="Patient Name" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope"></i></i></span>
                                </div>
                                <input name="email" type="email" class="form-control" id="inputemail" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input name="phone" type="number" class="form-control" id="validationCustomPhone" placeholder="Phone No." aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bloodType">Blood Group</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-notes-medical"></i></span>
                                </div>
                                <select class="form-control" id="bloodType" name="bloodType" required>
                                    <option disabled selected value>--Select Option--</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input name="city" type="text" class="form-control" id="validationCustomCity" placeholder="City" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doctorname">Doctor Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="doctorname" type="text" class="form-control" id="validationCustomDoctorname" placeholder="Doctor Name" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="request">Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>