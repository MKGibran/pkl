<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

    <?= $this->include('template/navbar') ?>

    <?= d($report); ?>

<?= $this->endSection() ?>