<div class="row">
        <div class="col-md-12">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6" style="color: #bbb;">
                
                        <caption>About 250 results (0.171 seconds) requested by 127.0.0.1</caption>
    
                    </div>
                  </div>
                </div> 
                <br>          
                <div class="table-responsive-sm">
                        <table class="table ">
                          <thead>
                                <th>Id</th>
                                <th>Name</th>                        
                                <th>Gender</th>
                                <th>Origin</th>
                                <th>Meaning</th>
                                <th>Modify</th>
                                <th>Remove</th>
                          </thead>
                          <?php if(!empty($babynames) && is_array($babynames)):?>
                            <?php foreach ($babynames as $name): ?>
                                        <tr>
                                                <td>
                                                      <a href="#"><?= $name['id'] ?></a>    
                                                </td>
                                                <td>
                                                      <?=$name['name'] ?>
                                                </td>
                                                <td>
                                                      <?=$name['gender'] ?>
                                                </td>
                                                <td>
                                                      <?=$name['origin'] ?>
                                                </td>
                                                <td>
                                                      <?=$name['meaning'] ?>
                                                </td>
                                                <td><a href="#">Edit</a></td>
                                                <td><a href="#" onClick="return confirm('Are you sure you want to delete this record?')">Delete</a> </td>
                                        </tr>                                               
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </table>
                </div>
        </div>


</div>