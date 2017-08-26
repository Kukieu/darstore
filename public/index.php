<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

           <!--Categories -->
		   <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <!-- karuzela -->
						<?php include(TEMPLATE_FRONT . DS . "carousel.php") ?>
						
                    </div>

                </div>

                <div class="row">
					<h1 class="text-center">Polecane</h1>
				
				
					<?php get_products(); ?>
					
					
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>