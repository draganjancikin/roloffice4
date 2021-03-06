<!DOCTYPE html>
<html lang="sr">
<head>
    <title>Klijenti</title>
    <?php include '../../app/includes/pageHead.php' ?>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include '../../app/includes/leftSidebarMeni.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../../app/includes/topBar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800">Klijenti</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
            
                        <!-- Tools Meni -->
                        <?php include '../../templates/client/includes/tools_menu.php' ?>
                        <!-- End of Tools Meni -->
          
                        <div class="col-lg-12 col-xl-10 px-2">
                        <?php
                        if (empty($_GET)): // ako je $_GET prazan
                            include '../../templates/client/includes/list_last.php';
                        else:
                            if(isset($_GET['viewClient'])) include '../../templates/client/includes/form_view_client.php';
                            if(isset($_GET['newClient'])) include '../../templates/client/includes/form_new_client.php';
                            if(isset($_GET['editClient'])) include '../../templates/client/includes/form_edit_client.php';
                            
                            if(isset($_GET['search'])) include '../../app/includes/search.php';
                            if(isset($_GET['advancedSearch'])) include '../../templates/client/includes/form_advanced_search.php';

                            if(isset($_GET['newCountry'])) include '../../templates/client/includes/form_new_country.php';
                            if(isset($_GET['newCity'])) include '../../templates/client/includes/form_new_city.php';
                            if(isset($_GET['newStreet'])) include '../../templates/client/includes/form_new_street.php';

                            if(isset($_GET['alert'])) include '../../app/includes/alerts.php';
                        endif;
                        ?>
                        </div>

                        <!-- Modals -->
                        <?php include '../../templates/client/includes/modals.php' ?>
                        <!-- End of Modals -->

                    </div>
                    <!-- End of Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
      
            <!-- Footer -->
            <?php include '../../app/includes/mainFooter.php' ?>
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
    <?php include '../../app/includes/pageBodyFooter.php' ?>
</body>
</html>
