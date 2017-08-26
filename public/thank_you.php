<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php 	
	process_transaction();
?>

    <!-- Page Content -->
    <div class="container">
	
	<!---<h1 class="center">Dziękujemy, Twoje zamówienie zostało zrealizowane</h1>-->
    
    <h3>Dziękujemy za dokonanie płatności. Transakcja została zakończona, a potwierdzenie przyjęcia zakupu zostało wysłane w wiadomości e-mail.
    Aby wyświetlić szczegóły dotyczące tej transakcji, zaloguj się do konta na stronie www.paypal.com.</h3>



    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>	