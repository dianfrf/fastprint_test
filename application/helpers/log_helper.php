<?php 
    function helper_log($user,$tipe,$str,$appname,$namadepo){
        $CI =& get_instance();   
        $CI->load->model('M_pajak');
        $CI->M_pajak->SaveLog($user,$str,$appname,$namadepo);
    }
?>