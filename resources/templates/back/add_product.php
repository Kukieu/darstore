<?php add_product(); ?>

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Dodawanie produktu</h1>
</div>
<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Nazwa </label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Główny opis</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Cena</label>
        <input type="number" step="any" name="product_price"  class="form-control" size="60">
      </div>
	  <div class="col-xs-3">
	  <label for="product-color">Kolor</label>
      <input type="text" step="any" name="product_color"  class="form-control" size="60">
	  <label for="product-color">Rodzaj czepka</label>
      <input type="text" step="any" name="product_cap_type"  class="form-control" size="60">
	  
	  <label for="product-color">Czubek głowy/przedziałek</label>
      <input type="text" step="any" name="product_tip"  class="form-control" size="60">
	  <label for="product-color">Gęstość</label>
      <input type="text" step="any" name="product_density"  class="form-control" size="60">
	  
	  <label for="product-color">Grubość</label>
      <input type="text" step="any" name="product_length"  class="form-control" size="60">
	  </div>
    </div>
</div><!--Main Content-->
<!-- SIDEBAR-->
<aside id="admin_sidebar" class="col-md-4">   
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Dodaj produkt">
    </div>
     <!-- Product Categories-->
    <div class="form-group">
         <label for="product-title">Kategoria</label>
        <select name="product_category_id" id="" class="form-control">
            <option value="">Wybierz kategorię</option>
			<?php show_categories_add_product_page();?>
           
        </select>
</div>
    <!-- Product Brands-->
    <div class="form-group">
      <label for="product-title">Ilość produktu na stanie</label>
         <input type="number" name="product_quantity"  class="form-control" size="60">
    </div>
<!-- Product Tags -->

<!------
    <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
--->
    <!-- Product Image -->
	<div class="form-group">
           <label for="product-title">Krótki opis</label>
      <textarea name="short_desc" id="" cols="30" rows="2" class="form-control" maxlength="24" placeholder="Maksymalnie 24 znaki"></textarea>
    </div>
	
    <div class="form-group">
        <label for="product-title">Obrazek produktu</label>
        <input type="file" name="file1">
		<input type="file" name="file2">
		<input type="file" name="file3">
		<input type="file" name="file4">
		<input type="file" name="file5">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



