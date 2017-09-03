<div id="footer">
    <footer>
        <div class="container-fluid">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="./?page=fonctionnement" class="btn-default" role="button">Fonctionnement</a></li>
                <li role="presentation"><a href="./?page=cgv" class="btn-default" role="button">C.G.U. (Pro)</a></li>
                <li role="presentation"><a href="./?page=cgu" class="btn-default" role="button">C.G.U.</a></li>
            </ul>
        </div>
    </footer>
</div>

<div class="modal fade" tabindex="-1" role="dialog">
    <div id="dialog-confirm" class="modal-dialog" role="document">
        <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
    if(NotificationGenerator::printMsg($post)){
        echo NotificationGenerator::printMsg($post);
    }
    elseif(NotificationGenerator::printMsg($get)){
        echo NotificationGenerator::printMsg($get);
    }
?>

<style>
    #alert-notif{
        z-index: 999999999 !important;
        position: fixed !important;
        top: 60px !important;
        right: 20px !important;
        width: 250px !important;
        display: block !important;
    }
</style>