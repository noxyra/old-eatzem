<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        CGV
                    </a>
                </li>
                <li>
                    <a href="#">
                        CGU
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; 2017 Eatzem
        </p>
    </div>
</footer>

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