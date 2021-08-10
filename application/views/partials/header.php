<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="<?= base_url()?>">Sistem Keluhan dan Saran</a>
        <ul class="navbar-nav ml-auto">
            <?php if($this->session->userdata('username')) { ?>
            <li class="nav-item">
                <a href="<?= base_url()?>auth/logout" class="nav-link">Logout <i class="fas fa-sign-out-alt"></i></a>
            </li>
            <?php } ?>
        </ul>
    </nav>