<?php  if (count($errors) > 0) : ?>
	<div class="alert alert-red" style="margin: 11px;margin-top: 0; padding-bottom: 3px;">
  	<?php foreach ($errors as $error) : ?>
  	  <p> <i class="fas fa-exclamation-circle"></i> <?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>