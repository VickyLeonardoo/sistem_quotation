<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV. GABRIL MITRA PERKASA</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      header {
        text-align: center;
        padding: 20px;
      }

      h1 {
        color:red;
        font-size: 36px;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center; /* Pusatkan logo secara vertikal */
      }

      h1 img {
        margin-right: 10px; /* Beri ruang di antara logo dan teks */
        max-height: 50px; /* Atur ukuran maksimum tinggi logo */
      }

      p {
        font-size: 14px;
        margin: 5px 0;
        padding: 0;
      }

      a {
        color: black;
        text-decoration: none;
      }

      .flex-container {
        display: flex;
      }

      .left {
        flex: 7;
        padding: 10px;
      }

      .right {
        flex: 5;
        padding: 10px;
        border: 1px solid black;
        box-sizing: border-box;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th {
        background-color: #bfbfbf;
      }

      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
      }

      .signature-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
      }

      .signature {
        text-align: center;
      }

      .signature-box {
        border: 1px solid black;
        width: 250px;
        padding: 10px;
        margin: 0 auto;
      }
    </style>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <h1>
        <img src="logo.png" alt="Logo" />
        CV. GABRIL MITRA PERKASA
      </h1>
      <p>
        JIG & FIXTURE ● FABRICATION ●MECHANICAL ●ELECTRICAL ● GENERAL
        ENGINEERING
      </p>
      <p>GENERAL TRADING ● GENERAL SERVICE</p>
      <p>
        Office : Perum. GMP Blok D No. 06 KEL. DURIANGKANG, KEC.SUNGAI BEDUK,
        Batam
      </p>
      <p>Workshop : Ruko Alexandria Blok B No. 42 - Batam</p>
      <p>Contact Phone : (+62) 812-67567765, (62)821-7034-7775</p>
      <p>
        Email : admin@gabrilmitraperkasa.com -
        <a href="https://gabrilmitraperkasa.com"
          >https://gabrilmitraperkasa.com</a
        >
      </p>
      <hr />
    </header>
    <h2 style="text-align: center; margin-top:-10px;">Delivery Order</h2>
    <div class="flex-container">
      <div class="left">
        <p>
          To : Panasonic Industrial Devices Singapore Pte. Ltd. <br />
          3 Bedok South Road Singapore 469269
        </p>
        <p>
          SHIP TO : Panasonic Industrial Devices Batam <br />
          Puri Industri Park 2000,Batam Center, <br />
          Kelurahan Baloi Permai,29463,Batam
        </p>
        <p>
          ATTN : Ms. Tiona/MS.Susmaida <br />
          CC : MS. Tuty/MS. Chong <br />
          TELP : 778465050 <br />
          FAX -
        </p>
      </div>
      <div class="right">
        <p>
          No : DO221211232 <br />
          Date : 10 Juli 2023 <br />
          PO/NO : PSRES_23070006 <br />
          Ordered BY : RESISTOR
        </p>
      </div>
    </div>

    <table>
      <tr>
        <th>No</th>
        <th>Description</th>
        <th>Quantity</th>
      </tr>
      <!-- Isi data tabel bisa ditambahkan di sini -->
      <tr>
        <td>1</td>
        <td>Product A</td>
        <td>10</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Product B</td>
        <td>5</td>
      </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="signature-container">
      <div class="signature">
          (___________________________) <br />
          Signature
      </div>
      <div class="signature">
          (___________________________) <br />
          Signature
      </div>
    </div>
  </body>
</html>
