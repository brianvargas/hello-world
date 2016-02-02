<?php
    require_once("Class/clsMain.php");
    require_once("Includes/paginator.php"); 
    $clsMain = new clsMain();
    $clname = $clsMain->getCampaignLeader_ByUserID();
    $location = $_SESSION['dbname'];
    $positions = $clsMain->getPositions();
?>

<?php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>ELECSYS | Main</title>
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
                    
                    <?php
                        foreach($positions as $val1) {
                    ?>
                    
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $val1['Position']; ?></div>
                    <?php
                            $candidates = $clsMain->getCandidates($val1['idPosition']);
                            foreach($candidates as $val2){
                    ?>
                            <div class="hidden-sm hidden-xs col-lg-12 col-md-12">
                                <h2 style="display: inline;"><a data-toggle="collapse" href="#<?php echo preg_replace('/\s+/', '', $val2['Candidate']); ?>"><?php echo $val2['Candidate']; ?></a></h2>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </div>
                            <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                                <h2><a data-toggle="collapse" href="#<?php echo preg_replace('/\s+/', '', $val2['Candidate']); ?>"><?php echo $val2['Candidate']; ?></a></h2>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </div>
                            <div id="<?php echo preg_replace('/\s+/', '', $val2['Candidate']); ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered text-center">
                                            <tr>
                                                <th>Tag</th>
                                                <th>Barangay</th>
                                                <th>Precinct No.</th>
                                                <th>Assigned Voters</th>
                                                <th colspan="2"><span class="glyphicon glyphicon-ok"></span> Favorable</th>
                                                <th colspan="2"><span class="glyphicon glyphicon-remove"></span> Un-Favorable</th>
                                            </tr>
                                            <?php
                                                
                                                $dashboard = $clsMain->getCampaignLeaderDashboard($val2['Candidate']);
                                                if ($dashboard){
                                                $totalVoters=0;
                                                $totalFavorable=0;
                                                $totalUnFavorable=0;
                                                $totalFavorableP=0;
                                                $totalUnFavorableP=0;
                                                foreach($dashboard as $val3){
                                                    $totalVoters+=$val3['Total Voters'];
                                                    $totalFavorable+=$val3['Favorable'];
                                                    $totalUnFavorable+=$val3['Un-Favorable'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <form style="display: inline;" name="preference" action="preference.php" method="POST">
                                                        <input type="hidden" name="idprecinct" value="<?php echo $val3['PrecinctID']; ?>"/>
                                                        <button type="submit" class="btn btn-success btn-md btn-block" ><span class="glyphicon glyphicon-tag"></span></button>
                                                    </form>
                                                </td>
                                                <td><?php echo $val3['Barangay']; ?></td>
                                                <td><?php echo $val3['Precinct']; ?></td>
                                                <td><?php echo $val3['Total Voters']; ?></td>
                                                <td><?php echo $val3['Favorable']; ?></td>
                                                <td><?php echo $val3['FavorableP']; ?></td>
                                                <td><?php echo $val3['Un-Favorable']; ?></td>
                                                <td><?php echo $val3['UnFavorableP']; ?></td>
                                            </tr>
                                            <?php
                                                }
                                                $totalFavorableP = round(($totalFavorable/$totalVoters)*100);
                                                $totalUnFavorableP = round(($totalUnFavorable/$totalVoters)*100);
                                                ?>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" style='text-align: right;'>Total:</td>
                                                    <td><?php echo $totalVoters; ?></td>
                                                    <td><?php echo $totalFavorable; ?></td>
                                                    <td><?php echo $totalFavorableP . '%'; ?></td>
                                                    <td><?php echo $totalUnFavorable; ?></td>
                                                    <td><?php echo $totalUnFavorableP . '%'; ?></td>
                                                </tr>
                                            </tfoot>
                                            <?php
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- End -->
        
        <!-- Footer -->
        <?php include '/Includes/incFooter.php'; ?>
        <!-- End -->
    </body>
</html>