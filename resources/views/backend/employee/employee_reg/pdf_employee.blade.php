
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #000;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #acacac;
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #000;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #000;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>

		<div class="invoice-box">
            <table>
                <tr class="top">
                    <td width="40%" class="title">
                        <?php $image_path = '/upload/logo.png'; ?>
                        <img src="{{ public_path() . $image_path  }}" alt="Logo">
                    </td>

                    <td width="50%">
                        School Address:<br />
                        Phone:<br />
                        Email: <br>
                        Employee Registration Page <br>
                        Print Date : {{ date('d M Y') }}
                    </td>
                </tr>
            </table>

			<table>

				<tr class="heading">
					<td width="10%">SL</td>
					<td width="45%">Employee Details</td>
					<td width="45%">Employee Data</td>
				</tr>

				<tr class="item">
					<td width="10%">1</td>
					<td width="45%"> <strong>Employee Name</strong> </td>
					<td width="45%">{{ $details->name }}</td>
				</tr>
				<tr class="item">
					<td width="10%">2</td>
					<td width="45%"> <strong>Employee ID No</strong> </td>
					<td width="45%">{{ $details->id_no }}</td>
				</tr>
				<tr class="item">
					<td width="10%">3</td>
					<td width="45%"> <strong>Father's Name</strong> </td>
					<td width="45%">{{ $details->f_name }}</td>
				</tr>
				<tr class="item">
					<td width="10%">4</td>
					<td width="45%"> <strong>Mother's Name</strong> </td>
					<td width="45%">{{ $details->m_name }}</td>
				</tr>
				<tr class="item">
					<td width="10%">5</td>
					<td width="45%"> <strong>Mobile Number</strong> </td>
					<td width="45%">{{ $details->mobile }}</td>
				</tr>
				<tr class="item">
					<td width="10%">6</td>
					<td width="45%"> <strong>Address</strong> </td>
					<td width="45%">{{ $details->addres] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">7</td>
					<td width="45%"> <strong>Gender</strong> </td>
					<td width="45%">{{ $details->gender }}</td>
				</tr>
				<tr class="item">
					<td width="10%">8</td>
					<td width="45%"> <strong>Religion</strong> </td>
					<td width="45%">{{ $details->religion }}</td>
				</tr>
				<tr class="item">
					<td width="10%">9</td>
					<td width="45%"> <strong>Date of Birth</strong> </td>
					<td width="45%">{{ date('d-m-Y', strtotime($details->dob)) }}</td>
				</tr>
				<tr class="item">
					<td width="10%">10</td>
					<td width="45%"> <strong>Discount</strong> </td>
					<td width="45%">{{ $details['designation']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">12</td>
					<td width="45%"> <strong>Join Date</strong> </td>
					<td width="45%">{{  date('d-m-Y', strtotime($details->join_date)) }}</td>
				</tr>
				<tr class="item">
					<td width="10%">13</td>
					<td width="45%"> <strong>Class</strong> </td>
					<td width="45%">{{ $details['student_class']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">14</td>
					<td width="45%"> <strong>Group</strong> </td>
					<td width="45%">{{ $details['student_grop']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">15</td>
					<td width="45%"> <strong>Shift</strong> </td>
					<td width="45%">{{ $details['student_shift']['name'] }}</td>
				</tr>


			</table>
		</div>
	</body>
</html>
