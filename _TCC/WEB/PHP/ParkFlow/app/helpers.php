<?php

use \App\Helpers\PageCheck;

if(!function_exists('checkLoginOrRedirect')) {
    function checkLoginOrRedirect()
    {
        if(!PageCheck::CheckLogin()) {
            return redirect('login')->send();
        }
    }
}

?>