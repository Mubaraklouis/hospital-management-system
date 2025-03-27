<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }

        .receipt-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            color: #4CAF50;
        }

        .header p {
            margin: 0;
            color: #555;
        }

        .details,
        .services,
        .footer {
            margin-bottom: 20px;
        }

        .details label,
        .services label {
            font-weight: bold;
        }

        .services table {
            width: 100%;
            border-collapse: collapse;
        }

        .services th,
        .services td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .footer {
            text-align: right;
        }

        .footer p {
            font-size: 18px;
            font-weight: bold;
        }

        .footer .total {
            color: #4CAF50;
        }
    </style>
</head>

<body>

    <div class="receipt-container">
        <div class="header">
            <h2>Hospital Name</h2>
            <p>Address Line 1, City, Country</p>
            <p>Phone: +123 456 7890 | Email: info@hospital.com</p>
        </div>

        <div class="details">
            <label>Patient Name:</label>
            <p>{{ $patient->name }}</p>
            <label>Patient ID:</label>
            <p>{{ $patient->patient_id }}</p>
            <label>Date of Registration:</label>
            <p>{{ $patient->created_at }}</p>
            <label>Recept:</label>
            <p>{{ $cashier }}</p>
        </div>

        <div class="services">
            <label>Services Provided:</label>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient->diagonoses as $diagonose )
                    <tr>

                        <td >{{$diagonose->title }}</td>
                        <td>1</td>
                        <td>{{ $diagonose->price }}</td>
                        <td>{{ $diagonose->price}} SSP</td>
                    </tr>

                    @endforeach



                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Total Amount: <span class="total">{{ $total }}</span></p>
        </div>

        <?php

        // Make Barcode object of Code128 encoding.
        $barcode = (new Picqer\Barcode\Types\TypeCode128())->getBarcode($patient->patient_id);

        // Output the barcode as HTML in the browser with a HTML Renderer
        $renderer = new Picqer\Barcode\Renderers\HtmlRenderer();
        echo $renderer->render($barcode);
        ?>
    </div>

</body>

</html>
