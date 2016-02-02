<?php require_once("Includes/db.php"); ?>
<?php
function perpage($count, $per_page = '10') {
        $output = '';
        $paging_id = "link_perpage_box";
        if(!isset($_POST["page"])) $_POST["page"] = 1;
        if($per_page != 0) $pages  = ceil($count/$per_page);
        if($pages>1) {

                if(($_POST["page"]-3)>0) {
                        if($_POST["page"] == 1)
                                $output = $output . '<span id=1 class="current-page">1</span>';
                        else				
                                $output = $output . '<input type="submit" name="page" class="perpage-link" value="1" />';
                }
                if(($_POST["page"]-3)>1) {
                                $output = $output . '<b> . . . </b>';
                }

                for($i=($_POST["page"]-2); $i<=($_POST["page"]+2); $i++)	{
                        if($i<1) continue;
                        if($i>$pages) break;
                        if($_POST["page"] == $i)
                                $output = $output . '<span id='.$i.' class="current-page" >'.$i.'</span>';
                        else				
                                $output = $output . '<input type="submit" name="page" class="perpage-link" value="' . $i . '" />';
                }

                if(($pages-($_POST["page"]+2))>1) {
                        $output = $output . '<b> . . . </b>';
                }
                if(($pages-($_POST["page"]+2))>0) {
                        if($_POST["page"] == $pages)
                                $output = $output . '<span id=' . ($pages) .' class="current-page">' . ($pages) .'</span>';
                        else				
                                $output = $output . '<input type="submit" name="page" class="perpage-link" value="' . $pages . '" />';
                }

        }
        return $output;
}

function showperpage($sql, $per_page = 10) {        
        $result = dbLOG()->getDataSet($sql);
        $count   = count($result);
        $perpage = perpage($count, $per_page);        
        return $perpage;
}
?>