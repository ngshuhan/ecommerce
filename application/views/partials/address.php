<address>
	<strong><?=$first_name?>, <?= $last_name?></strong><br>
	<?php  echo $street;
			if (!Empty($apt_suite)) {
				echo ", ".$apt_suite;
			} ?><br>

	<?= $city.", ".$state." ".$zip_code?><br>
	<a href="mailto:#"><?= $email?></a>
</address>
<a href="/orders/new">Edit</a>

