<?php include("header.tpl"); ?>
	<div class="page-header">
		<h2><?php echo $this->data['titulo']; ?></h2>
		<p><code><?php echo Helpers::breadcrumb($this->data['breadcrumb']); ?></code></p>
	</div>
	
	<?php include("comentario-bloco.tpl"); ?>

	<section>
	   <table id="mytable" class="table table-bordred table-striped">
			<thead>
				<th>Tabelas</th>
				<th></th>
			</thead>
		    <tbody>
		    	<?php foreach($this->data['tables'] as $table){ ?>
		    	<tr>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $table['Tables_in_'.$this->data['schema']]; ?>">
							<?php echo $table['Tables_in_'.$this->data['schema']]; ?>
						</a>
		    		</td>
		    		<td></td>
		    	</tr>
		    	<?php
		    	}
		    	?>
		    </tbody>
		</table>
	</section>	
<?php include("footer.tpl"); ?>