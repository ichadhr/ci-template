<?php if (!empty($errors)) : ?>
	<div class="errors" role="alert">
		<ul>
		<?php foreach ($errors as $error) : ?>
			<li><?php echo esc($error); ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
