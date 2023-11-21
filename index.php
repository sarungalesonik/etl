<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: login.php');
  exit();
}
require_once "api/autoload/init.php";
require_once "includes/config.php";
require_once "includes/op_functions.php";

?>
<!DOCTYPE html>

<html
  lang="en"
  class="dark-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-dark"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>ETL | Workfolio</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <?php require_once "views/components/style.php"; ?>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php require_once "views/components/nav.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php require_once "views/components/header.php"; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y main-content" id="PageMainWrapper">
              
            </div>
            <!-- / Content -->

            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <?php require_once "views/components/script.php"; ?>
  </body>
</html>
