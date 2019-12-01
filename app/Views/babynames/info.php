
	<div class="row">
		<div class="col-md">
			<?php if (! empty($babyname)) : ?>
				<div class="card" style="width: 25rem;">
				  <img src="https://picsum.photos/200/150/?random" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title"><?=$babyname['name'] ?></h5>
				    <p class="card-text"><a href="#"><?=$babyname['meaning'] ?></a></p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"><b>Id</b> : <small><?=$babyname['id'] ?></small></li>
				    <li class="list-group-item"><b>Gender</b> : <a href="#"><?=$babyname['gender'] ?></a></li>
				    <li class="list-group-item"><b>Origin</b> : <a href="#"><?=$babyname['origin'] ?></a></li>
				  </ul>
				  <div class="card-body">
				    <a href="#" class="card-link">Facebook</a>
				    <a href="#" class="card-link">Google</a>
				     <a href="javascript:self.history.back();" class="btn btn-secondary float-right btn-sm">Back</a>
				  </div>
				</div>
			 <?php else : ?>
				<div class="card" style="width: 18rem;">
				  <img src="..." class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Unknown</h5>
				    <p class="card-text">Anonymous</p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Id : unknown</li>
				    <li class="list-group-item">Gender : unknown</li>
				    <li class="list-group-item">Origin : unknown</li>
				  </ul>
				  <div class="card-body">
				    <a href="#" class="card-link">Facebook</a>
				    <a href="#" class="card-link">Google</a>
				  </div>
				</div>
			<?php endif ?>
		</div>
	</div>
