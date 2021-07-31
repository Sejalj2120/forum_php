<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign-Up for a Cummins Forum account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="\forum_php\partials\_handleSignup.php" method="post" onsubmit="return validate();">
                    <div class="modal-body">
                        <!-- signup form from bootstrap -->
                        <div class="form-group">
                            <label for="fname">First Name:</label><span id="user_fname" class="error-info" style="color: #FF0000;"></span>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Eg: John" required><br/>
                            <label for="lname">Last Name:</label><span id="user_lname" class="error-info" style="color: #FF0000;"></span>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Eg: Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cummins Email id:</label><span id="user_info" class="error-info" style="color: #FF0000;"></span>
                            <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" placeholder="Ex: johndoe@cumminscollege.in" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label><span id="password_info" class="error-info" style="color: #FF0000;"></span>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label><span id="passwordc_info" class="error-info" style="color: #FF0000;"></span>
                            <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">SignUp</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";

        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var userName = document.getElementById("signupEmail").value;
        var password = document.getElementById("signupPassword").value;
        var passwordc = document.getElementById("signupcPassword").value;
        if (fname == "") {
            document.getElementById("user_fname").innerHTML = "*required";
            $valid = false;
        }
        if (lname == "") {
            document.getElementById("user_lname").innerHTML = "*required";
            $valid = false;
        }
        if (userName == "") {
            document.getElementById("user_info").innerHTML = "*required";
            $valid = false;
        }
        if (password == "") {
            document.getElementById("password_info").innerHTML = "*required";
            $valid = false;
        }
        if (passwordc == "") {
            document.getElementById("passwordc_info").innerHTML = "*required";
            $valid = false;
        }
        return $valid;
    }
</script>