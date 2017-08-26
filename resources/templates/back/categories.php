<?php add_category();?>
<h1 class="page-header">
  Edycja kategorii

</h1>
<h4 class="bg-success"><?php display_message();?></h4>


<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Nazwa</label>
            <input name="cat_title" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="add_category" type="submit" class="btn btn-primary" value="Dodaj kategorię">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Nazwa</th>
        </tr>
            </thead>


    <tbody>
        <?php show_categories_in_admin(); ?>
    </tbody>

        </table>

</div>

