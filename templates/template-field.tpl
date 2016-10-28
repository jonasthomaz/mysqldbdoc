<?php include("header.tpl"); ?>
	<div class="page-header">
		<h2><?php echo $this->data['titulo']; ?></h2>
		<p><code><?php echo Helpers::breadcrumb($this->data['breadcrumb']); ?></code></p>
	</div>

	<?php include("comentario-bloco.tpl"); ?>

	<section>
	   <table id="mytable" class="table table-bordred table-striped">
			<thead>
				<th>Field</th>
				<th>Type</th>
				<th>Null</th>
				<th>Key</th>
				<th>Default</th>
				<th>Extra</th>
				<th></th>
			</thead>

		    <tbody>
		    	<?php
		    	foreach($this->data['fieldinfo'] as $field){
		    	?>
		    	<tr>
		    		<td>
		    			<?php echo $field['Field']; ?>
		    		</td>
		    		<td>
		    			<?php echo $field['Type']; ?>
		    		</td>
		    		<td>
		    			<?php echo $field['Null']; ?>
		    		</td>
		    		<td>
		    			<?php echo $field['Key']; ?>
		    		</td>
		    		<td>
		    			<?php echo $field['Default']; ?>
		    		</td>
		    		<td>
		    			<?php echo $field['Type']; ?>
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