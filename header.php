<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DFA WashU Official Website</title>
  <?php wp_head(); ?>
</head>

<body>

  <header>
    <a href="<?php echo site_url(''); ?>" class="brand"><img
        src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a>
    <div class="menu">
      <div class="btn-menu">
        <i class="fas fa-times close-btn"></i>
      </div>
      <a href="<?php echo site_url('/join-dfa-washu'); ?>">Join DFA WashU</a>
      <a href="<?php echo site_url('/partner-with-us'); ?>">Partner with Us</a>
      <a href="<?php echo site_url('/past-projects'); ?>">Past Projects</a>
      <div class="dropdown">
        <a href="<?php echo site_url('/about-us'); ?>">About Us</a>
        <div class="dropdown-content">
          <a href="<?php echo site_url('/about-us/#Our_Process'); ?>">Our Process</a>
          <a href="<?php echo site_url('/about-us/#Our_Values'); ?>">Our Values</a>
          <a href="<?php echo site_url('/about-us/#Mission_Statement'); ?>">Mission Statement</a>
        </div>
      </div>
    </div>
    <div class="btn-menu">
      <i class="fas fa-bars menu-btn"></i>
    </div>
  </header>