<?php

class clsFunc{
    
    
    
    public function msgBox($msg){
        echo "<div class='modal fade' id='myModal' role='dialog'>\n"
        ."  <div class='modal-dialog modal-sm'>\n"
        ."    <div class='modal-content'>\n"
        ."      <div class='modal-header'>\n"
        ."        <button type='button' class='close' data-dismiss='modal'>&times;</button>\n"
        ."        <h4 class='modal-title'>Message</h4>\n"
        ."      </div>\n"
        ."      <div class='modal-body'>\n"
        ."        <p>$msg</p>\n"
        ."      </div>\n"
        ."      <div class='modal-footer'>\n"
        ."        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>\n"
        ."      </div>\n"
        ."    </div>\n"
        ."  </div>\n"
        ."</div>\n";
    }
}
                            
?>