<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php 
//if(isset($_SESSION['product_1'])){
//	
//	echo $_SESSION['product_1'];
//}

//echo $_SESSION['item_total'];
//display_message();
?>

    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

	<h4 class="text-center bg-danger"><?php display_message();?></h4>
    <h1>Kasa</h1>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="busmichal@gmail.com">
<input type="hidden" name="currency_code" value="PLN">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Nazwa</th>
           <th>Cena</th>
           <th>Ilość</th>
           <th>Cena łączna</th>
     
          </tr>
        </thead>
        <tbody>
          <?php cart(); ?>  
        </tbody>
    </table>
	<?php echo show_paypal_button(); ?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Podsumowanie</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Ilość:</th>
<td><span class="amount"><?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?></span></td>
</tr>
<!-----<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr> ----->

<tr class="order-total">
<th>Kwota zamówienia</th>
<td><strong><span class="amount">
<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>zł
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>