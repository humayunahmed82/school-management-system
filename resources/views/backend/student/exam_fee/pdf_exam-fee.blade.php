
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

        @php
            $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$details->class_id)->first();
            $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;
        @endphp

		<div class="invoice-box">
            <table>
                <tr class="top">
                    <td width="40%" class="title">
                        <?php $image_path = '/upload/logo.png'; ?>
                        <img src="{{ public_path() . $image_path  }}" alt="Logo">
                    </td>

                    <td width="50%">
                        School Address:<br />
                        Phone: <br />
                        Email: <br>
                        <b>Student Exam Fee</b> <br>
                        Print Date : {{ date('d M Y') }}
                    </td>
                </tr>
            </table>

			<table>

				<tr class="heading">
					<td width="10%">SL</td>
					<td width="45%">Student Details</td>
					<td width="45%">Student Data</td>
				</tr>


                <tr class="item">
					<td width="10%">1</td>
					<td width="45%"> <strong>ID No</strong> </td>
					<td width="45%">{{ $details['student']['id_no'] }}</td>
				</tr>
                <tr class="item">
					<td width="10%">2</td>
					<td width="45%"> <strong>Roll No</strong> </td>
					<td width="45%">{{ $details->roll }}</td>
				</tr>
				<tr class="item">
					<td width="10%">3</td>
					<td width="45%"> <strong>Student Name</strong> </td>
					<td width="45%">{{ $details['student']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">4</td>
					<td width="45%"> <strong>Father's Name</strong> </td>
					<td width="45%">{{ $details['student']['f_name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">5</td>
					<td width="45%"> <strong>Session</strong> </td>
					<td width="45%">{{ $details['student_year']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">6</td>
					<td width="45%"> <strong>Class</strong> </td>
					<td width="45%">{{ $details['student_class']['name'] }}</td>
				</tr>
				<tr class="item">
					<td width="10%">7</td>
					<td width="45%"> <strong>Exam Fee</strong> </td>
					<td width="45%">{{ $originalfee }}$</td>
				</tr>
				<tr class="item">
					<td width="10%">8</td>
					<td width="45%"> <strong>Discount Fee</strong> </td>
					<td width="45%">{{ $discount }}%</td>
				</tr>
				<tr class="item">
					<td width="10%">9</td>
					<td width="45%"> <strong>Fee For this Student of {{ $exam_type }}</strong> </td>
					<td width="45%">{{ $finalfee }}$</td>
				</tr>

			</table>

		</div>

        <hr style="border: 1px dashed #000">

        <div class="invoice-box">

            <table>

                <tr class="heading">
                    <td width="10%">SL</td>
                    <td width="45%">Student Details</td>
                    <td width="45%">Student Data</td>
                </tr>


                <tr class="item">
                    <td width="10%">1</td>
                    <td width="45%"> <strong>ID No</strong> </td>
                    <td width="45%">{{ $details['student']['id_no'] }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">2</td>
                    <td width="45%"> <strong>Roll No</strong> </td>
                    <td width="45%">{{ $details->roll }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">3</td>
                    <td width="45%"> <strong>Student Name</strong> </td>
                    <td width="45%">{{ $details['student']['name'] }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">4</td>
                    <td width="45%"> <strong>Father's Name</strong> </td>
                    <td width="45%">{{ $details['student']['f_name'] }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">5</td>
                    <td width="45%"> <strong>Session</strong> </td>
                    <td width="45%">{{ $details['student_year']['name'] }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">6</td>
                    <td width="45%"> <strong>Class</strong> </td>
                    <td width="45%">{{ $details['student_class']['name'] }}</td>
                </tr>
                <tr class="item">
                    <td width="10%">7</td>
                    <td width="45%"> <strong>Exam Fee</strong> </td>
                    <td width="45%">{{ $originalfee }}$</td>
                </tr>
                <tr class="item">
                    <td width="10%">8</td>
                    <td width="45%"> <strong>Discount Fee</strong> </td>
                    <td width="45%">{{ $discount }}%</td>
                </tr>
                <tr class="item">
                    <td width="10%">9</td>
                    <td width="45%"> <strong>Fee For this Student of {{ $exam_type }}</strong> </td>
                    <td width="45%">{{ $finalfee }}$</td>
                </tr>

            </table>

        </div>

	</body>
</html>
