<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/thema/semantic.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/framework7/css/framework7.bundle.css" />
	<script src="<?= base_url(); ?>assets/thema/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/thema/semantic.min.js"></script>
	<script src="<?= base_url(); ?>assets/framework7/js/framework7.bundle.js"></script>
</head>

<body class="cover">
	<div class="pusher">
		<div class="ui fluid container">
			<div class="ui basic segment">
				<div id="div_container" class="ui container">
					<h2 class="ui header">Grouping with array</h2>
					<div class="isi" id="isi"></div>
					<!-- <div class="ui styled accordion">
						<div class="active title">
							<i class="dropdown icon"></i>
							Level 1
						</div>
						<div class="active content">
							Welcome to level 1
							<div class="accordion">
								<div class="title active">
									<i class="dropdown icon"></i>
									Level 1A
								</div>
								<div class="content active">
									<p class="transition visible" style="display: block !important;">Level 1A Contents</p>
									<div class="accordion transition visible" style="display: block !important;">
										<div class="title">
											<i class="dropdown icon"></i>
											Level 1A-A
										</div>
										<div class="content">
											Level 1A-A Contents
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var ip_server = '<?= base_url(); ?>';
		$(document).ready(function() {

			$.ajax({
				url: ip_server + 'welcome/get_all',
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					const groups = data.reduce((group, data) => {
						const {
							NAMA_OUTLET
						} = data;
						group[NAMA_OUTLET] = group[NAMA_OUTLET] ?? [];
						group[NAMA_OUTLET].push(data);
						return group;
					}, {});
					let isi = '';
					$.each(groups, function(key, val) {
						let isi_det = '';
						let i = 0;
						console.log(val.length);
						for (let index = 0; index < val.length; index++) {
							isi_det += `<li>` + val[index].NAMA + `</li>
										<li>` + val[index].TGL_PEMBELIAN + `</li>`;
							console.log('test')
						}
						isi += `<ul>
									<li>` + key + `</li>
										<ul>
											` + isi_det + `		
										</ul>
								</ul>`;
						i++;
					})
					$('#isi').html(isi);
				},
				error: function(xhr, status, error) {
					alert("error ajax")
				}
			});
		});
	</script>
</body>

</html>