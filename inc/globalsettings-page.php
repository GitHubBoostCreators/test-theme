<?php
	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	function globalsettings_page() {
		?>
<div class="container-fluid">
    <h1>Global Settings</h1>

    <div class="mb-3">
        <label for="headerScripts" class="form-label">Header scripts</label>
		<textarea class="form-control" id="headerScripts" rows="5"></textarea>
    </div>

	<div class="mb-3">
        <label for="footerScripts" class="form-label">Footer scripts</label>
		<textarea class="form-control" id="footerScripts" rows="5"></textarea>
    </div>

	<div class="mb-3">
        <label for="bodyTopScripts" class="form-label">Body scripts - Top</label>
		<textarea class="form-control" id="bodyTopScripts" rows="5"></textarea>
    </div>

	<div class="mb-3">
        <label for="bodyBottomScripts" class="form-label">Body scripts - Bottom</label>
		<textarea class="form-control" id="bodyBottomScripts" rows="5"></textarea>
    </div>

	<a href="#" class="btn btn-primary">Save changes</a>




</div>
<?php
	}
?>