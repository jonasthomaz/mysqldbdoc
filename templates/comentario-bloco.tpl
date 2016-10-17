	<!-- INICIO: Seção de comentários -->
	<section>
		<form method="POST" action="<?php echo APP_URI;  ?>savecomment">
			<input type="hidden" id="objeto" name="objeto" value="<?php echo $this->data['objeto'] ?>">
			<div class="form-group">
			  <label for="comment">Comment:</label>
			  <textarea class="form-control" rows="3" id="comment" name="comment"><?php echo $this->data['comments']['comentario']; ?></textarea>
			</div>
			<div class="form-group">
				<input type="text" name="tags" value="<?php echo $this->data['comments']['tags']; ?>" data-role="tagsinput">
			</div>
			<button type="submit" class="btn btn-default">Salvar</button>
		</form>
	</section>
	<!-- FIM: Seção de comentários -->