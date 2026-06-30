<?php

session_start();

include("../includes/functions.php");

if(!isLoggedIn())
{
    redirect("../auth/login.php");
}