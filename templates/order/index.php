<!DOCTYPE html>
<html lang="sr">
<head>
  <title>Nabavka</title>
  <?php include '../../app/includes/pageHead.php'; ?>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    
    <!-- Sidebar -->
    <?php include '../../app/includes/leftSidebarMeni.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '../../app/includes/topBar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Nabavka</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Tools Meni -->
            <?php include '../../templates/order/includes/toolsMenu.php'; ?>
            <!-- End of Tools Meni -->

            <div class="col-lg-12 px-2">
              <?php 
                if (empty($_GET)): // ako je $_GET prazan
                  include '../../templates/order/includes/listLast.php';
                else:
                  if(isset($_GET['view'])) include '../../templates/order/includes/formView.php';
                  if(isset($_GET['edit'])) include '../../templates/order/includes/formEdit.php';
                  if(isset($_GET['new'])) include '../../templates/order/includes/formNew.php';
                  
                  if(isset($_GET['search'])) include '../../app/includes/search.php';
                endif;
              ?>
            </div>

            <!-- Modals -->
            <?php include '../../templates/order/includes/modals.php'; ?>
            <!-- End of Modals -->

          </div>
          <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <!-- Footer -->
      <?php include '../../app/includes/mainFooter.php'; ?>
      <!-- End of Footer -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- page body footer -->
  <?php include '../../app/includes/pageBodyFooter.php'; ?>
</body>
</html>
