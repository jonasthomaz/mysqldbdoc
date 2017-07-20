<?php include("header.tpl"); ?>
	<div class="page-header">
		<h2><?php echo $this->data['titulo']; ?></h2>
		<p><code><?php echo Helpers::breadcrumb($this->data['breadcrumb']); ?></code></p>
	</div>

	<section>
	   <table id="mytable" class="table table-bordred table-striped">
			<thead>
				<th>Objeto</th>
				<th>Comentários</th>
				<th>Tags</th>
			</thead>
		    <tbody>
		    	<?php foreach($this->data['result'] as $result){ ?>
		    	<tr>
		    		<td>
						<?php echo $result['objeto']; ?>
		    		</td>
		    		<td>
		    			<?php echo $result['comentario']; ?>
		    		</td>
		    		<td>
		    			<?php echo $result['tags']; ?>
		    		</td>
		    	</tr>
		    	<?php
		    	}
		    	?>
		    </tbody>
		</table>
	</section>	
<?php include("footer.tpl"); ?>