<?php
    class NotificationGenerator{
        public static function printMsg(array $a){
            if(isset($a['err_msg'])){
                return "<div id='alert-notif' class='alert alert-danger alert-dismissible' role='alert'><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" . $a['err_msg'] . "</div>";
            }
            if(isset($a['war_msg'])){
                return "<div id='alert-notif' class='alert alert alert-warning alert-dismissible' role='alert'><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" . $a['war_msg'] . "</div>";
            }
            if(isset($a['suc_msg'])){
                return "<div id='alert-notif' class='alert alert alert-success alert-dismissible' role='alert'><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" . $a['suc_msg'] . "</div>";
            }
            if(isset($a['inf_msg'])){
                return "<div id='alert-notif' class='alert alert alert-info alert-dismissible' role='alert'><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" . $a['inf_msg'] . "</div>";
            }
            return false;
        }
    }