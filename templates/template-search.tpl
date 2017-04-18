<?php include("header.tpl"); ?>
	<div class="page-header">
		<h2><?php echo $this->data['titulo']; ?></h2>
		<p><code><?php echo Helpers::breadcrumb($this->data['breadcrumb']); ?></code></p>
	</div>

	<?php include("comentario-bloco.tpl"); ?>

	<br/><br/>
	<section>
	   <table id="mytable" class="table table-bordred table-striped">
			<thead>
				<th>Schemas</th>
				<th></th>
			</thead>
		    <tbody>
		    	<?php foreach($this->data['schemas'] as $schema){ ?>
		    	<tr>
		    		<td>
					    <a href="<?php echo APP_URI;  ?>read/<?php echo $schema['Database']; ?>">
							<?php echo $schema['Database']; ?>
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