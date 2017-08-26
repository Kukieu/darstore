                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Użytkownicy
                         
                        </h1>
                          <p class="bg-success">
                            
                        </p>

                        <a href="index.php?add_user" class="btn btn-primary">Dodaj użytkownika</a>
						<h4 class="bg-success"><?php display_message();?></h4>

                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Login</th>
                                        <!----<th>Hasło</th>---->
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php //foreach($users as $user): ?>

                                    
								<?php display_users();?>
                                    


                                <?php //endforeach; ?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>                     
                    </div>