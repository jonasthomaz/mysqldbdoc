<?php include("header.tpl"); ?>

  <div class="page-header">
    <h1>Conexões</h1>
    <p>Adicione, edite ou exclua conexões.</p>
  </div>
  
   <table id="mytable" class="table table-bordred table-striped">
		<thead>
			<th><input type="checkbox" id="checkall" /></th>
			<th>Alias</th>
			<th>Host</th>
            <th>Schema</th>
            <th>User</th>
		</thead>
	    <tbody>
	    	<?php
	    	foreach($this->data['lstServidores'] as $servidor){
	    	?>
	    	<tr>
	    		<td></td>
	    		<td></td>
	    		<td></td>
	    		<td></td>
	    		<td></td>
	    	</tr>
	    	<?php
	    	}
	    	?>
	    </tbody>
	</table>

  
<?php include("footer.tpl"); ?>