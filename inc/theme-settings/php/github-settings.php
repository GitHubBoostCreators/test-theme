<form id="githubsettingsform">
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row">
					<label for="githubtoken">GitHub token</label>
				</th>
				<td>
					<input name="githubtoken" type="text" id="githubtoken" value="<?php echo get_option('github_token');?>" class="regular-text">
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button button-primary" value="Wijzigingen opslaan">
	</p>
</form>