<?php
	function blacklist_page() {
		?>
		<div class="container theme-settings">
    	<h2>Blacklist</h2>
		<div class="form-text">
			<p>Overzicht ip adressen (<?php echo get_option('theme_number_of_failed_attempts'); ?>) mislukte inlog pogingen. uw ip-adress (<?php echo getUserIpAddr(); ?>).
			</p>
		</div>
		
		<form id="blacklistform">
			<div class="mb-3 col-12 col-md-5 col-lg-3">
				<label for="userip" class="form-label">Voeg ip adres toe</label>
				<input type="text" class="form-control" id="userip" aria-describedby="useripHelp">
			</div>
			<button type="submit" class="button button-primary mb-3">Toevoegen</button>
		</form>
		<?php
		global $wpdb;
		$table_name = $wpdb->prefix . 'blacklisting';
		
		$sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE %d GROUP BY userip", 1));
		if( $sql ){
			$num = 0;
			?>
			<table class="table table-striped">
				<thead>
    				<tr>
      					<th scope="col">#</th>
      					<th scope="col">ip</th>
      					<th scope="col">tijd</th>
      					<th scope="col">verwijderen</th>
    				</tr>
  				</thead>
				<tbody>
			<?php
			foreach ($sql as $blacklist) {
				$appendedtime = new DateTime($blacklist->appendedtime);
				$appendedtime = $appendedtime->format('d-m-Y H:i:s');
				$userip = $blacklist->userip;
				$num++;
				?>
				<tr>
					<th scope="row"><?php echo $num; ?></th>
					<td>
						<p><?php echo  $userip; ?></p>
					</td>
					<td>
						<p><?php echo $appendedtime; ?></p>
					</td>
					<td>
						<a href="#" class="remove-blacklist" data-userip="<?php echo $userip; ?>">
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php

    		}
			?>
				</tbody>
			</table>
			<?php
		}
		if( ! $sql ){
			?>
				<div>
					<p class="font-weight-bold">Blacklist is leeg.</p>
				</div>
			<?php
		}
		?>
		</div>
		<?php
	}
?>