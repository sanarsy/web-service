<!DOCTYPE html>
<html lang="en">
	<head>
		<!--load view header -->
		 <?php
			$this->load->view($header);
		 ?>
		 <!--/header-->
	</head>

	<body>
		
		<?php

		$this->load->view($navbar);

		?>	

		<?php

		$this->load->view($sidebar);

		?>	

		<!--mainbar-->
		
		<?php

			$this->load->view($body);

		?>	

		<!--/mainbar-->


	</body>

</html>
