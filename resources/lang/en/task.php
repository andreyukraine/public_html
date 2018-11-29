<?php

if (@session::has('success')){
    echo Session::get('success');
}
