<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $data['title']; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= assets('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('vendor/fontawesome/css/all.css') ?>">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= assets('css/style.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/components.css') ?>">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?= $this->view('template/topbar'); ?>
            <?= $this->view('template/sidebar', $data['sidebar']); ?>