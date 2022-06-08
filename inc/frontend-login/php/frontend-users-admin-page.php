<?php
	function frontend_users_page() {
		?>
		<div id="adminmodal" class="admin-modal theme-settings">
			<div class="admin-modal-content">
  				<div class="admin-modal-header">
    				<span class="admin-modal-close">&times;</span>
    				<h2 class="text-light" id="modalheader"></h2>
  				</div>
  				<div class="admin-modal-body">
					<div id="responsemessage"></div>
    				<form id="editfrontenduserform">
						<div class="col-12 col-md-6 col-lg-6 m-auto">
							<label for="editusername" class="form-label">Gebruikersnaam</label>
							<input type="text" class="form-control" id="editusername">
							<label for="editpassword" class="form-label">Wachtwoord</label>
							<input type="password" class="form-control" id="editpassword">
							<label for="displayname" class="form-label">Weergavenaam</label>
							<input type="text" class="form-control" id="editdisplayname">
							<button type="submit" class="btn btn-primary mt-3 mb-3">Bewerken</button>
						</div>
					</form>
  				</div>
  				<div class="admin-modal-footer">
    				<h3 class="text-light" id="modalfooter"></h3>
  				</div>
			</div>
		</div>
		<div class="container theme-settings">
    	<h2>Gebruikers</h2>
		<div class="form-text">
			<p>Overzicht frontend gebruikers.</p>
		</div>
		
		<form id="addfrontenduserform">
			<div class="mb-3 col-12 col-md-5 col-lg-3">
				<label for="username" class="form-label">Gebruikersnaam</label>
				<input type="text" class="form-control" id="username">
				<label for="password" class="form-label">Wachtwoord</label>
				<input type="password" class="form-control" id="password">
				<label for="displayname" class="form-label">Weergavenaam</label>
				<input type="text" class="form-control" id="displayname">
			</div>
			<button type="submit" class="btn btn-primary mb-3">Toevoegen</button>
		</form>
		<?php
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'users_frontend';
		$sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE %d", 1));
		
		if( $sql ):
			$num = 0;
			?>
			<table class="table table-striped">
				<thead>
    				<tr>
      					<th scope="col">#</th>
      					<th scope="col">gebruikersnaam</th>
      					<th scope="col">weergavenaam</th>
      					<th scope="col">registratiedatum</th>
      					<th scope="col">bewerken</th>
      					<th scope="col">verwijderen</th>
    				</tr>
  				</thead>
				<tbody>
			<?php
			foreach ($sql as $frontenduser) :
				$userregistered = new DateTime($frontenduser->user_registered);
				$userregistered = $userregistered->format('d-m-Y H:i:s');
				$username = $frontenduser->user_login;
				$displayname = $frontenduser->display_name;
				$id = $frontenduser->id;
				$num++;
				?>
				<tr>
					<th scope="row"><?php echo $num; ?></th>
					<td>
						<p><?php echo  $username; ?></p>
					</td>
					<td>
						<p><?php echo $displayname; ?></p>
					</td>
					<td>
						<p><?php echo $frontenduser->user_registered; ?></p>
					</td>
					<td>
						<a href="#" class="edit-frontenduser" data-id="<?php echo $id; ?>">
							<i class="fas fa-user-edit"></i>
						</a>
					</td>
					<td>
						<a href="#" class="remove-frontenduser" data-id="<?php echo $id; ?>">
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php

    		endforeach;
			?>
				</tbody>
			</table>
			<?php
		endif;
		if( ! $sql ):
			?>
				<div>
					<p class="font-weight-bold">Geen gebruikers gevonden.</p>
				</div>
			<?php
		endif;
		?>
		</div>
		<?php
	}
?>
