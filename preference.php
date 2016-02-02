<?php
    require_once("Class/clsMain.php");
    require_once("Includes/paginator.php"); 
    $clsMain = new clsMain();
    $clname = $clsMain->getCampaignLeader_ByUserID();
    $location = $_SESSION['dbname'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>ELECSYS | Preference</title>
        <?php include '/Includes/incHead.php'; ?>
    </head>
    <body>
        <!-- Navigation -->
        <?php include '/Includes/incNav.php'; ?>
        <!-- End -->
        
        <!-- Content -->
        <div id="home" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 head-text hidden-sm hidden-xs">
                        <h1><?php echo $location; ?></h1>                        
                    </div>
                    <div class="col-sm-12 col-xs-12 head-text hidden-lg hidden-md pad-botm">
                        <h1>Welcome!</h1>
                        <label class='user'><?php echo $clname; ?></label>
                    </div>
                    <div class='col-lg-8 col-md-8 col-xs-12 col-sm-12'>
                        <h3>Mayor Cruz, Jayson</h3>
                        <h4>Precinct: 0073A <a href="main.php" class="btn btn-primary btn-sm">Back to My Portal</a></h4>
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Voter Name</th>
                                    <th><span class="glyphicon glyphicon-ok"></span></th>
                                    <th><span class="glyphicon glyphicon-remove"></span></th>
                                </tr>
                                
                                <tr>
                                    <td>1</td>
                                    <td class="text-left">Abando,Evangeline Lucilo</td>
                                    <td><input id="radioFV" type="radio" name="rd1" class="radio radio-inline"></td>
                                    <td><input id="radioUF" type="radio" name="rd1" class="radio radio-inline"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-left">Aderes,Avelina Laisan</td>
                                    <td><input id="radioFV" type="radio" name="rd2" class="radio radio-inline"></td>
                                    <td><input id="radioUF" type="radio" name="rd2" class="radio radio-inline"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-left">Adolfo,Arthur Atega</td>
                                    <td><input id="radioFV" type="radio" name="rd3" class="radio radio-inline"></td>
                                    <td><input id="radioUF" type="radio" name="rd3" class="radio radio-inline"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-left">Adolfo,Mary Ann Atega</td>
                                    <td><input id="radioFV" type="radio" name="rd4" class="radio radio-inline"></td>
                                    <td><input id="radioUF" type="radio" name="rd4" class="radio radio-inline"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
        
        <!-- Footer -->
        <?php include '/Includes/incFooter.php'; ?>
        <!-- End -->
    </body>
</html>