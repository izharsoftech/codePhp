<?php

if(!isset($_SESSION['username']) || !isset($_SESSION['name'])){
    header('Location:' . url('login'));
    exit;
}
