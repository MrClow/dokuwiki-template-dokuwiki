<?php

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
if (!defined('DOKU_LF')) define('DOKU_LF',"\n");

function _tpl_discussion($discussNS='discussion:',$link=0) {
    if(substr($ID,0,strlen($discussNS))==$discussNS) {
        $backID = substr(strstr($ID,':'),1);
        if ($link)
            echo tpl_pagelink(':'.$backID,$lang['btn_back']);
        echo html_btn('back',$backID,'',array());
        //function html_btn($name,$id,$akey,$params,$method='get',$tooltip=''){

    } else {
        if ($link)
            echo tpl_pagelink($discussNS.$ID,$lang['btn_discussion']);
        echo html_btn('discussion',$discussNS.$ID,'',array());
    }
}
