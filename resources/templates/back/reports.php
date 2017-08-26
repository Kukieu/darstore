
<h1 class="page-header">
   Raporty

</h1>

<h3 class="bg-success"><?php display_message(); ?></h3>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Id produktu</th>
           <th>Id zamówienia</th>
           <th>Cena</th>
           <th>Nazwa</th>
           <th>Ilość</th>
      </tr>
    </thead>
    <tbody>

      
  <?php get_reports(); ?>


  </tbody>
</table>



