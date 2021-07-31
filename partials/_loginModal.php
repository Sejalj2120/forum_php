<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to Cummins Forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="\forum_php\partials\_handleLogin.php" method = "post" id="frmLogin" onsubmit="return validate();">
            <div class="modal-body text-center">
                <!-- login form from bootstrap -->
                    <div class="form-group">
                        <label for="loginEmail">Email address</label><span id="user_info" class="error-info" style="color: #FF0000;"></span>
                        <input type="email" class="form-control" id="loginEmail" name= "loginEmail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="loginEmail">Password</label><span id="password_info" class="error-info" style="color: #FF0000;"></span>
                        <input type="password" class="form-control" id="loginPass" name="loginPass"  placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
        function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("loginEmail").value;
        var password = document.getElementById("loginPass").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "*required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "*required";
            $valid = false;
        }
        return $valid;
    }
    </script>