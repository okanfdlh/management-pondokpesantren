<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji - {{ $salary->employee->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .salary-info {
            width: 100%;
            border-collapse: collapse;
        }

        .salary-info td {
            padding: 8px 12px;
            vertical-align: top;
        }

        .salary-info td.label {
            font-weight: bold;
            width: 200px;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12px;
            color: #666;
        }

        .line {
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Slip Gaji Karyawan</h1>
        <div class="line"></div>
    </div>

    <table class="salary-info">
        <tr>
            <td class="label">Nama Karyawan</td>
            <td>: {{ $salary->employee->name }}</td>
        </tr>
        <tr>
            <td class="label">Jumlah Gaji</td>
            <td>: Rp {{ number_format($salary->amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pembayaran</td>
            <td>: {{ $salary->payment_date->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Status Pembayaran</td>
            <td>: {{ ucfirst($salary->payment_status) }}</td>
        </tr>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>
</body>
</html>
