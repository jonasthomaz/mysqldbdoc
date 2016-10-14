<?php include("header.tpl"); ?>
	<div class="page-header">
		<h1><?php echo $_SESSION['current_host']['alias']; ?></h1>
		<p>Vamos começar? Selecione um dos <code>schemas</code> para começar a documentar seu banco de dados.</p>
	</div>


	<section>
		<div class="list-group">
		<?php foreach($this->data['schemas'] as $schema){ ?>
			<a href="<?php echo APP_URI;  ?>read/<?php echo $schema['Database']; ?>" class="list-group-item">
				<?php echo $schema['Database']; ?>
			</a>
		<?php } ?>
		</div>
		<?php
				print_r($this->data['schemas']);
		?>
	</section>
<?php include("footer.tpl"); ?>