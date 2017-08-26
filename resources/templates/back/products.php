
        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   Produkty

</h1>

<h4 class="bg-success"><?php display_message();?></h4>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Nazwa</th>
           <th>Kategoria</th>
           <th>Cena</th>
		   <th>Ilość</th>
      </tr>
    </thead>
	<tbody>
    <?php get_products_in_admin();?>
	</tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->




