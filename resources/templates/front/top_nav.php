<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">DarStore</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="shop.php">Wszystkie produkty</a>
                    </li>
                    <li>
                        <a href="login_cms.php">cms</a>
                    </li>
                    
                     <li>
                        <a href="checkout.php">Koszyk <?php //echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?></a>
                        
                    </li>
                    <li>
                        <a href="contact.php">Kontakt</a>
                    </li>
					<li>
                        <a href="register.php">Rejestracja</a>
                    </li>
					</ul>
					<?php 
					echo show_login_area();
					login_user();
					echo show_dropdown_area();
					?>
					
					<!---<h4 class="text-center bg-warning" ><?php display_message(); ?></h4>---->
                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->	