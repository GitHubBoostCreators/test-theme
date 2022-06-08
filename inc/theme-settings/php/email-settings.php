<form id="emailsettingsform">
	<table class="form-table" role="presentation">
		<?php //get_option('email_issmtp');?>
		<?php //get_option('email_smtpauth');?>
		<tbody>
			<tr class="option-site-visibility">
				<th scope="row">Is SMTP</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span>Is SMTP </span>
						</legend>
						<label for="emailissmtp">
							<input name="emailissmtp" type="checkbox" id="emailissmtp" value="0">
								Is SMTP
						</label>
						<p class="description"></p>
					</fieldset>
				</td>
			</tr>
			<tr class="option-site-visibility">
				<th scope="row">SMTP Auth</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span>SMTP Auth </span>
						</legend>
						<label for="emailsmtpauth">
							<input name="emailsmtpauth" type="checkbox" id="emailsmtpauth" value="0">
								SMTP Auth
						</label>
						<p class="description"></p>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="githubtoken">SMTP secure</label>
				</th>
				<td>
					<input name="smtpsecure" type="text" id="smtpsecure" value="<?php echo get_option('email_smtpsecure');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailhost">E-mail host</label>
				</th>
				<td>
					<input name="emailhost" type="text" id="emailhost" value="<?php echo get_option('email_host');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailport">E-mail port</label>
				</th>
				<td>
					<input name="emailport" type="text" id="emailport" value="<?php echo get_option('email_host');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailusername">E-mail username</label>
				</th>
				<td>
					<input name="emailusername" type="text" id="emailusername" value="<?php echo get_option('email_username');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailpassword">E-mail password</label>
				</th>
				<td>
					<input name="emailpassword" type="text" id="emailpassword" value="<?php echo get_option('email_password');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailfrom">E-mail from</label>
				</th>
				<td>
					<input name="emailfrom" type="text" id="emailfrom" value="<?php echo get_option('email_from');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailfromname">E-mail fromname</label>
				</th>
				<td>
					<input name="emailfromname" type="text" id="emailfromname" value="<?php echo get_option('email_fromname');?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="emailsender">E-mail sender</label>
				</th>
				<td>
					<input name="emailsender" type="text" id="emailsender" value="<?php echo get_option('email_sender');?>" class="regular-text">
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button button-primary" value="Wijzigingen opslaan">
	</p>
</form>
							

