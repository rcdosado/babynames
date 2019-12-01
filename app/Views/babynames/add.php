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
  </div>
  <a href='javascript:self.history.back();'>Go Back</a>
</nav>    
<div class="row">
        <div class="col-md-12">  
              <?php foreach($errors as $error):?>
                <div class="alert alert-danger" role="alert">
                  <?= $error ?>
                </div>
              <?php endforeach ?>   
                                 
                <form name="addform" action="<?= site_url('add') ?>" method="POST">
                  <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>

                <div class="form-group">
                  <label for="comment">Meaning:</label>
                  <textarea class="form-control" rows="5" id="comment" name="meaning"></textarea>
                </div>    
                <div class="form-group">
                    <label for="origin">Origin :</label>
                    <input type="text" class="form-control" id="origin" name="origin">
                </div>
                <div>     
                        <label for="comment">Gender:</label>                   
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="male" checked>Male
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="female">Female
                          </label>
                        </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-right">Save</button>
                
                </form>
        </div>
</div>
