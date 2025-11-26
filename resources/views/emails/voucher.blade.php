<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Voucher Diskon 10%</title>
</head>

<body style="margin:0; padding:0; background:#eee; font-family: 'Georgia', serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" style="background:#f8f5ef; padding:30px; border-radius:10px; border:6px solid #a9a76f;">

                <tr>
                    <td align="center" style="font-size:26px; color:#7c4c45; font-style:italic; padding-bottom:10px;">
                        Congratulations! You’ve earned a 10% off coupon.
                    </td>
                </tr>

                <tr>
                    <td align="center">

                        <table width="90%" cellpadding="0" cellspacing="0" style="background:#9c5c5c; padding:25px; border-radius:15px; border:6px dashed #f8f5ef; color:#f8f5ef;">
                            <tr>
                                <td align="center" style="font-size:48px; font-weight:bold; font-style:italic;">
                                    Save <span style="font-size:60px;">10%</span> Off
                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="padding-top:10px; font-size:14px;">
                                    All items with this coupon.<br>
                                    Visit Booth XI PPLG 2, SMK Telkom Purwokerto Hall<br>
                                    December 3rd<br>
                                    Don’t miss this special offer!
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding-top:25px;">

                        <a href="{{ route('voucher.show', $voucherCode) }}"
                            style="background:#b46d72; color:white; padding:12px 28px;
                                    text-decoration:none; border-radius:8px; font-size:16px;">
                            Klik untuk menukarkan
                        </a>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
