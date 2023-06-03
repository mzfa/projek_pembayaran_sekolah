<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Bukti Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <style type="text/css" id="operaUserStyle"></style>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* .batas{
            width: 100%;
            height: 100%;
        } */
        tr{
            margin: auto;
        }
        td{
            padding: 5px;
        }
        .repat {
            color: grey;
            background-repeat: repeat-x;
            position: absolute;
            overflow: hidden;
            opacity: 0.2;
            top: 50%;
            left: 40%;
            z-index: 100;
            font-size: 30px;
            transform: rotate(60deg);
            transform-origin: top center;
            margin-left: 4rem;
            color: #852c98;
        }
    </style>
</head>

<body style="margin: auto;">
    <div class="batas">

    </div>
    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block text-center">
                                                        <h2><img src="<?= base_url('assets') ?>/images/logo.svg" alt="Logo zulfikar" width="150px" style="margin: 0;padding:0;">
                                                            <br><br><br> BUKTI PEMBAYARAN
                                                        </h2>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                    <td class="content-block text-center" style="
                                        transform: rotate(50deg);
                                        transform-origin: top center;
                                        margin-left: 4rem;
                                        position: absolute;
                                        z-index: 100;
                                        opacity: 0.2;
                                        font-size:35px;
                                   
                                    ">
                                    STRUK ASLI <br>YAYASAN CAHAYA SUNNAH</td>
                                </tr> -->
                                                <tr>
                                                    <td class="content-block text-center">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2"><?= $siswa[0]['nama_siswa'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">Periode Masuk : <?= $siswa[0]['periode_masuk'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <hr>
                                                                    </td>
                                                                </tr>
                                                                <?php 
                                                                $total = 0 ;
                                                                foreach($transaksi as $item){ 
                                                                    $total += $item['total_bayar'];
                                                                    ?>
                                                                <tr>
                                                                    <td width="60%"><?= $item['periode_transaksi'] ?></td>
                                                                    <td class="alignright">Rp. <?= number_format($item['total_bayar']) ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <hr>
                                                                    </td>
                                                                </tr>
                                                                <tr class="total">
                                                                    <td class="alignleft" width="60%">
                                                                        <h2>Total</h2>
                                                                    </td>
                                                                    <td class="alignright">
                                                                        <h2>Rp. <?= number_format($total) ?></h2>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block text-center">
                                                        Printed : Saturday, 03-06-2023 </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block text-center">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="footer">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td class="aligncenter content-block text-center">Dicetak pada Aplikasi Pembayaran Sekolah</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <style type="text/css">
        /* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
        * {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            box-sizing: border-box;
            font-size: 14px;
        }

        img {
            max-width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6;
        }

        /* Let's make sure all tables have defaults */
        table td {
            vertical-align: top;
        }

        /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
        body {
            background-color: #f6f6f6;
        }

        .body-wrap {
            background-color: #f6f6f6;
            width: 100%;
        }

        .container {
            display: block !important;
            max-width: 600px !important;
            margin: 0 auto !important;
            /* makes it centered */
            clear: both !important;
        }

        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
            padding: 20px;
        }

        /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
        .main {
            background: #fff;
            border: 1px solid #e9e9e9;
            border-radius: 3px;
        }

        .content-wrap {
            padding: 20px;
        }

        .content-block text-center {
            padding: 0 0 20px;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .footer {
            width: 100%;
            clear: both;
            color: #999;
            padding: 20px;
        }

        .footer a {
            color: #999;
        }

        .footer p,
        .footer a,
        .footer unsubscribe,
        .footer td {
            font-size: 12px;
        }

        /* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
        h1,
        h2,
        h3 {
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            color: #000;
            margin: 40px 0 0;
            line-height: 1.2;
            font-weight: 400;
        }

        h1 {
            font-size: 32px;
            font-weight: 500;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 18px;
        }

        h4 {
            font-size: 14px;
            font-weight: 600;
        }

        p,
        ul,
        ol {
            margin-bottom: 10px;
            font-weight: normal;
        }

        p li,
        ul li,
        ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        /* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
        a {
            color: #1ab394;
            text-decoration: underline;
        }

        .btn-primary {
            text-decoration: none;
            color: #FFF;
            background-color: #1ab394;
            border: solid #1ab394;
            border-width: 5px 10px;
            line-height: 2;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 5px;
            text-transform: capitalize;
        }

        /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .aligncenter {
            text-align: center;
        }

        .alignright {
            text-align: right;
        }

        .alignleft {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        /* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
        .alert {
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            padding: 20px;
            text-align: center;
            border-radius: 3px 3px 0 0;
        }

        .alert a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .alert.alert-warning {
            background: #f8ac59;
        }

        .alert.alert-bad {
            background: #ed5565;
        }

        .alert.alert-good {
            background: #1ab394;
        }

        /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
        .invoice {
            margin: 40px auto;
            text-align: left;
            width: 80%;
        }

        .invoice td {
            padding: 5px 0;
        }

        .invoice .invoice-items {
            width: 100%;
        }

        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }

        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
        @media only screen and (max-width: 640px) {

            h1,
            h2,
            h3,
            h4 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .container {
                width: 100% !important;
            }

            .content,
            .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
    </style>

    <script type="text/javascript">

    </script>

</body>

</html>