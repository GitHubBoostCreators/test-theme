<form id="securityform">
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row">
					<label for="maxattempts">Maximaal aantal foute login pogingen</label>
				</th>
				<td>
					<input name="maxattempts" type="text" id="maxattempts" value="<?php echo get_option('theme_number_of_failed_attempts');?>" class="regular-text">
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button button-primary" value="Wijzigingen opslaan">
	</p>
</form>