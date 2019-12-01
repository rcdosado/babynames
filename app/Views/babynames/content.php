<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                   <a class="nav-link" href="#"><h2><?= $title ?></h2><span class="sr-only">(current)</span></a>
                </li>
        </ul>
        <form class="form-inline" role="form" action="search.php" method="GET">
                        <div class="form-group">

                                <input type="text" class="form-control" name="query" placeholder="Search Baby Names">
                                <select class="form-control" id="FormControlSelect1" name="field">
                                      <option>name</option>
                                      <option>gender</option>
                                      <option>origin</option>
                                      <option>meaning</option>
                                </select>
                        </div>
                <button type="submit" class="btn btn-info" name="submit" >Search</button>
                <a href="<?= site_url('add') ?>" class="btn btn-danger" role="button">Add New</a>                
        </form>
  </div>
</nav>
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
                                                      <a href="<?= site_url('info/').$name['id']?>"><?= $name['id'] ?></a>    
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
                                                <td><a href="<?= site_url('edit')."/".$name['id'] ?>">Edit</a></td>
                                                <td><a href="<?= site_url('delete/').$name['id'] ?>" onClick="return confirm('Are you sure you want to delete this record?')">Delete</a> </td>
                                        </tr>                                               
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </table>
                </div>
        </div>


</div>