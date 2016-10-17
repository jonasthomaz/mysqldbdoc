<?php include("header.tpl"); ?>
	<div class="page-header">
		<h1><?php echo $_SESSION['current_host']['alias']; ?></h1>
		<p><code><?php echo Helpers::breadcrumb($this->data['breadcrumb']); ?></code></p>
	</div>


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
		    	foreach($this->data['fields'] as $field){
		    	?>
		    	<tr>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    			<?php echo $field['Field']; ?>
		    			</a>
		    		</td>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    				<?php echo $field['Type']; ?>
		    			</a>
		    		</td>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    				<?php echo $field['Null']; ?>
		    			</a>
		    		</td>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    				<?php echo $field['Key']; ?>
		    			</a>
		    		</td>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    				<?php echo $field['Default']; ?>
		    			</a>
		    		</td>
		    		<td>
		    			<a href="<?php echo $this->data['path_link']; ?>/<?php echo $field['Field']; ?>">
		    				<?php echo $field['Type']; ?>
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