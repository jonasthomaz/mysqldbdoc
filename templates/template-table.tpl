<?php include("header.tpl"); ?>
	<div class="page-header">
		<h1><?php echo $_SESSION['current_host']['alias']; ?></h1>
		<h1><?php echo $this->data['breadcrumb']; ?></h1>

		<p>Vamos começar? Selecione um dos <code>schemas</code> para começar a documentar seu banco de dados.</p>
	</div>


	<section>
		<div class="list-group">
		<?php foreach($this->data['tables'] as $table){ ?>
			<a href="<?php echo APP_URI;  ?>read/<?php echo $table['Tables_in_'.$this->data['schema']]; ?>" class="list-group-item">
				<?php echo $table['Tables_in_'.$this->data['schema']]; ?>
			</a>
		<?php } ?>
		</div>
	</section>
<?php include("footer.tpl"); ?>