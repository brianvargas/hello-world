<?php
    require_once("Class/clsUser.php");
    $location = $_SESSION['dbname'];
    $clsUser = new clsUser();
    $updateAccountOk = false;
    
    if (array_key_exists("updateProfile", $_POST)) {
        $clsUser->updateUserProfile(
                $_POST['fullname'],
                $_POST['contactno'],
                $_POST['description']
                );
    }
    else if (array_key_exists("updateAccount", $_POST)) {
        $updateAccountOk = $clsUser->updateAccount(
                $_POST['username'],
                $_POST['password'],
                $_POST['confirmpassword']
                );
    }
    
    $user = $clsUser->getUserInfo();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>ELECSYS | User</title>
        <?php include '/Includes/incHead.php'; ?>
    </head>
    <body>
        <!-- Navigation -->
        <?php include '/Includes/incNav.php'; ?>        
        <!-- End -->
        
        <!-- Content -->
        <div id="home" class="container">
            <div class="row center-block">
                <h1><?php echo $location; ?></h1>
                <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8">
                    <a href="main.php" class="btn btn-primary btn-block btn-lg">Back to My Portal</a><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <form method="POST" action="Users.php">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">My Profile
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-success btn-sm" name="updateProfile">Update Profile</button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="control-label">Full Name:</div>
                                            <input type="text" autocomplete="off" class="form-control" required="required" name="fullname" value="<?php  if(isset($user)){ echo $user['userinfo']; }?>"/>
                                        <div class="control-label">Contact No:</div>
                                            <input type="text" autocomplete="off" class="form-control" required="required" name="contactno" value="<?php if(isset($user)){ echo $user['contactno']; }?>"/>
                                        <div class="control-label">Description</div>
                                            <input type="text" autocomplete="off" class="form-control" name="description" value="<?php if(isset($user)){ echo $user['description']; }?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <form method="POST" action="users.php">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">My Account
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-success btn-sm" name="updateAccount">Update Account</button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                        <div class="form-group">
                                            <div class="control-label">Username:</div>
                                                <input type="text" autocomplete="off" class="form-control" required="required" name="username" value="<?php  if(isset($user)){ echo $user['username']; }?>"/>
                                            <div class="control-label">Password:</div>
                                                <input type="password" class="form-control" required="required" name="password" autocomplete="off"/>
                                            <div class="control-label">Confirm Password:</div>
                                                <input type="password" class="form-control" required="required" name="confirmpassword" autocomplete="off"/>
                                            <div class="text-danger">
                                                <?php
                                                if ($_SERVER['REQUEST_METHOD'] == "POST") {                
                                                    if (!$updateAccountOk)
                                                        echo "Your passwords doesn't match.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End -->
        
        <!-- Footer -->
        <?php include '/Includes/incFooter.php'; ?>
        <!-- End -->
        
        <script type="text/javascript">
            $(window).load(function(){
                $('#myModal').modal('show');
            });
        </script>
    </body>
</html>