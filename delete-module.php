<?php
use App\Model\DB;

require 'partials/head.php';

DB::get()
    ->query('DELETE FROM module WHERE id = ' . $_GET['id'])
    ->execute();

header('Location: index.php');