<!-- resources/views/eticket.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>E-Tiket | Antarkota</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .ticket {
            border: 2px dashed #ccc;
            padding: 20px;
            width: 100%;
            max-width: 500px;
            margin: auto;
        }

        .ticket h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket div {
            margin: 8px 0;
        }

        .btn-download {
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background: #38bdf8;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="ticket" id="ticketArea">
        <h2>E-TIKET</h2>
        <div><strong>Nama Pemesan:</strong> {{ $pemesanan->nama }}</div>
        <div><strong>Kota Asal:</strong> {{ $pemesanan->asal }}</div>
        <div><strong>Tujuan:</strong> {{ $pemesanan->tujuan }}</div>
        <div><strong>Tanggal Keberangkatan:</strong> {{ $pemesanan->tanggal }}</div>
        <div><strong>Jumlah Penumpang:</strong> {{ $pemesanan->penumpang }}</div>
        @if ($pemesanan->catatan)
            <div><strong>Catatan:</strong> {{ $pemesanan->catatan }}</div>
        @endif
    </div>

    <div class="btn-download">
        <button onclick="downloadPDF()">Download e-Tiket (PDF)</button>
    </div>

    <!-- CDN html2canvas dan jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        async function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const ticket = document.getElementById('ticketArea');

            html2canvas(ticket).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("e-tiket-{{ $pemesanan->kode_booking }}.pdf");
            });
        }
    </script>
</body>

</html>
