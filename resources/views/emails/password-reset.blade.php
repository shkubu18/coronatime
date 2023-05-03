<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px; min-width: 300px; margin: 0 auto; background-color: #fff;">
    <tr>
        <td align="center" valign="top" style="padding: 10px;">
            <img src="https://i.ibb.co/MVCCTpK/email.png" alt="dashboard" style="max-width: 100%;">
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px 10px;">
            <h1 style="font-size: 25px; margin: 45px 0 15px 0;">{{ __('sending-emails.password_confirmation') }}</h1>
            <h3 style="font-size: 18px; font-weight: normal; margin-bottom: 35px;">{{ __('sending-emails.password_recover') }}</h3>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 300px;">
                <tr>
                    <td align="center" bgcolor="#0FBA68" style="border-radius: 6px;">
                        <a href="{{ route('password.reset', $token) }}" target="_blank" style="color: #ffffff; display: inline-block; font-size: 16px; font-weight: bold; padding: 12px 24px; text-decoration: none; text-transform: uppercase;">{{ __('sending-emails.password_recover_btn') }}</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

