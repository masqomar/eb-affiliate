<!DOCTYPE html>
<html lang="{{ $locale ?? 'pl' }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $title ?? 'Email signature' }}</title>

	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

	<style>
		.si-body {
			display: block;
			padding: 0px;
			margin: 0px;
		}

		.si-wrapper {
			width: 100%;
			display: block;
			overflow: hidden;
			box-sizing: border-box;
			color: #222;
			background: #f2f2fd;
			font-size: 18px;
			font-weight: normal;
			font-family: 'Baloo 2', 'Open Sans', 'Roboto', 'Segoe UI', 'Helvetica Neue', Helvetica, Tahoma, Arial, monospace, sans-serif;
		}

		.si-table a.proton-link {
			display: inline-block;
			width: auto !important;
			outline: none !important;
			text-decoration: none !important;
		}

		.si-border {
			width: 640px;
			margin: 50px auto;
			border: 1px solid #191715;
			border-radius: 20px;
			overflow: hidden;
		}

		.si-table {
			border-collapse: collapse;
			border-spacing: 0px;
			border: 0px;
			width: 640px;
			margin: 0px auto;
			background-color: #F1EBE4;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			border-top-width: 3px;
		}

		.si-table td,
		.si-table th {
			padding: 10px 20px;
			border-bottom: 1px solid #191715;
		}

		.si-foto {
			display: block;
			height: 170px;
			width: 150px;
			object-fit: cover;
			border: 4px solid #ff4400;
			box-shadow: 0px 0px 0px 4px #ff4400aa, 0px 0px 0px 8px #ff440055;
			border-radius: 20px;
			transition: all 1s;
		}

		.si-name {
			color: #191715;
			font-weight: 900;
			font-size: 25px;
			border-left: 1px solid #191715;
		}

		.si-title {
			text-align: left;
			border-left: 1px solid #191715;
		}

		.si-title strong {
			color: #ff4400;
			font-weight: 700;
			font-size: 19px;
		}

		.si-row {
			text-align: left;
			border-left: 1px solid #191715;
		}

		.si-row strong {
			font-weight: 600;
			font-size: 19px;
		}

		.si-social {
			background: #191715;
			color: #F1EBE4;
			padding: 15px;
			border: 0px;
		}

		.si-icon {
			float: left;
			height: 30px;
			width: 30px;
			margin-right: 10px;

		}

		.si-company img {
			float: left;
			width: 150px;
		}
	</style>
</head>

<body class="si-body">
	<div class="si-wrapper">
		<div class="si-border">
			<table class="si-table">
				<tbody>
					<tr>
						<td class="si-company" colspan="2">
							Kampung Inggris Booster&nbsp;&nbsp;&nbsp;#{{ $mailData['code'] }}
						</td>
					</tr>
					<tr class="si-image">
						<td rowspan="5" width="200px">
							<img class="si-foto" src="https://kampunginggrisbooster.com/wp-content/uploads/2024/05/English-Booster-Website-Icon-150x150.png" alt="English Booster Logo">
						</td>
						<td class="si-name">{{ $mailData['name'] }}</td>
					</tr>
					<tr>
						<td class="si-title"><strong>{{ $mailData['gender'] }}</strong></td>
					</tr>
					<tr>
						<td class="si-row"><strong>{{ $mailData['email'] }}</strong></td>
					</tr>
					<tr>
						<td class="si-row"><strong>{{ $mailData['phone_number'] }}</strong></td>
					</tr>
					<tr>
						<td class="si-row">
							<table>
								<tr>
									<th>Program:</th>
									<td><strong>{{ $mailData['program'] }}</strong></td>
								</tr>
								<tr>
									<th>Periode:</th>
									<td><strong>{{ $mailData['period'] }}</strong></td>
								</tr>
								<tr>
									<th>Biaya Program:</th>
									<td><strong>Rp. {{ $mailData['price'] }}</strong></td>
								</tr>
								<tr>
									<th>Uang Muka:</th>
									<td><strong>Rp. {{ $mailData['down_payment'] }}</strong></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="si-social">
							<a href="https://wa.me/6282231050500" class="proton-link"><img class="si-icon" src="https://img.icons8.com/?size=128&id=16713&format=png"></a>
							<a href="https://x.com/eboosterpare" class="proton-link"><img class="si-icon" src="https://img.icons8.com/?size=128&id=13963&format=png"></a>
							<a href="https://www.instagram.com/kampunginggrisbooster/" class="proton-link"><img class="si-icon" src="https://img.icons8.com/?size=128&id=32323&format=png"></a>
							<a href="https://www.youtube.com/@kampunginggrisbooster" class="proton-link"><img class="si-icon" src="https://img.icons8.com/?size=128&id=19318&format=png"></a>
							<a href="https://www.tiktok.com/kampunginggrisbooster/" class="proton-link"><img class="si-icon" src="https://img.icons8.com/?size=128&id=fdfLpA6fsXN2&format=png"></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>