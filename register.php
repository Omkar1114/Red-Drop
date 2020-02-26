<?php
require('db.php');
if (isset($_REQUEST['username'])) {
    session_start();
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($con, $city);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con, $phone);
    $bloodType = stripslashes($_REQUEST['bloodType']);
    $bloodType = mysqli_real_escape_string($con, $bloodType);
    $age = stripslashes($_REQUEST['age']);
    $age = mysqli_real_escape_string($con, $age);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "INSERT into `user` (username, password, city, phone, email, bloodType, age)
    VALUES ('$username', '" . md5($password) . "', '$city', '$phone', '$email', '$bloodType', '$age')";
    $result = mysqli_query($con, $query);
    $_SESSION['username'] = $username;
    if ($result) {
        header("Location: /Red-Drop/home.php");
    }
} else {
    ?>
    <!-- register -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="register" action="register.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope"></i></i></span>
                                </div>
                                <input name="email" type="email" class="form-control" id="inputemail" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="username" type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                            </div>
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
                                <select name="bloodType" class="form-control" id="bloodType" required>
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
                            <label for="age">Age</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input name="age" type="number" class="form-control" id="validationCustomAge" placeholder="Age" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>