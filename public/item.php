<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<script src="js/item.js"></script>
    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

	   
           <?php //include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
		   
<?php 

$query = query(" SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
	
	confirm($query);
	
	while($row = fetch_array($query)):
			

?>		   

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       

 <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <img src="" class="enlargeImageModalSource" style="width: 100%;">
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="row img-responsive">
        <div class="col-md-1"><img class="img-responsive" style="width:100%; height:auto; cursor:pointer;" src="../resources/uploads/<?php echo $row['product_id']; ?>/<?php echo display_image($row['product_image']);?>"></div>
        <div class="col-md-1"><img class="img-responsive" style="width:100%; height:auto; cursor:pointer;" src="../resources/uploads/<?php echo $row['product_id']; ?>/<?php echo display_image($row['add_image_2']);?>"></div>
        <div class="col-md-1"><img class="img-responsive" style="width:100%; height:auto; cursor:pointer;" src="../resources/uploads/<?php echo $row['product_id']; ?>/<?php echo display_image($row['add_image_3']);?>"></div>
		<div class="col-md-1"><img class="img-responsive" style="width:100%; height:auto; cursor:pointer;" src="../resources/uploads/<?php echo $row['product_id']; ?>/<?php echo display_image($row['add_image_4']);?>"></div>
		<div class="col-md-1"><img class="img-responsive" style="width:100%; height:auto; cursor:pointer;" src="../resources/uploads/<?php echo $row['product_id']; ?>/<?php echo display_image($row['add_image_5']);?>"></div>
    </div>    
</div>
	
	
    </div> 
	
	
    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['product_title'];?></a></h4> <p class="well well-sm text-right">Pozostało <?php echo $row['product_quantity'];?> sztuk</p>
        <hr>
        <h4 class=""><?php echo $row['product_price'] . " zł";?></h4>

    <!--<div class="ratings">
     
        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>-->
          
        <p><?php echo $row['short_desc'];?></p>

   
    <form action="">
        <div class="form-group">
            <a href="../resources/cart.php?add=<?php echo $row['product_id']; ?>"  class="btn btn-primary">Dodaj do koszyka</a>
        </div>
    </form>

    </div>
 
</div>

</div>
</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">
<!-- TABELA ------------------------------------------------------------------------------------------------------------------>


<div class="tg-wrap table-responsive"><table class="table table-striped">
  <tr>
    <th class="tg-yw4l">Kolor</th>
    <th class="tg-yw4l"><?php echo $row['product_color'];?></th>
  </tr>
  <tr>
    <td class="tg-yw4l">Rodzaj czepka</td>
    <td class="tg-yw4l"><?php echo $row['product_cap_type'];?></td>
  </tr>
  <tr>
    <td class="tg-yw4l">Czubek głowy / przedziałek</td>
    <td class="tg-yw4l"><?php echo $row['product_tip'];?></td>
  </tr>
  <tr>
    <td class="tg-yw4l">Gęstość</td>
    <td class="tg-yw4l"><?php echo $row['product_density'];?></td>
  </tr>
  <tr>
    <td class="tg-yw4l">Długość</td>
    <td class="tg-yw4l"><?php echo $row['product_length'];?></td>
  </tr>
</table></div>


<div role="tabpanel">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Więcej informacji</a></li>
   <!-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li> -->

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

           
    <p><pre><?php 
	$product_description_temp = $row['product_description'];
	$product_description = $product_description_temp; 
	echo $product_description; 
	?></pre></p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">

       <h3>2 Reviews From </h3>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">10 days ago</span>
                <p>This product was great in terms of quality. I would definitely buy another!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">12 days ago</span>
                <p>I've alredy ordered another one!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">15 days ago</span>
                <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
            </div>
        </div>

    </div>


    <div class="col-md-6">
        <h3>Add A review</h3>

     <form action="" class="form-inline">
        <div class="form-group">
            <label for="">Name</label>
                <input type="text" class="form-control" >
            </div>
             <div class="form-group">
            <label for="">Email</label>
                <input type="test" class="form-control">
            </div>

        <div>
            <h3>Your Rating</h3>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>

            <br>
            
             <div class="form-group">
             <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
            </div>

             <br>
              <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>
        </form>

    </div>

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>

<?php endwhile; ?>

</div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
