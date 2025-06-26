<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Email</title>
</head>
<body style="margin:0; padding:0; background:#eee; font-family: Arial, Helvetica, sans-serif;">

  <div style="padding: 20px 0;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; margin: 0 auto; background: #fff; padding-bottom: 30px;">
      
      <!-- Logo -->
      <tr>
        <td colspan="2" align="center" style="padding: 20px;">
          <img 
            src="http://127.0.0.1:9000/images/PAFALOGO.png" 
            width="50" 
            alt="PAFA Logo" 
            style="display:block;"
          />
        </td>
      </tr>

      <!-- Greeting -->
      <tr>
        <td colspan="2" align="center" style="padding: 10px; font-size: 20px; font-weight: bold;">
          Welcome, {{ $username }}
        </td>
      </tr>

      <!-- Message Body -->
      <tr>
        <td colspan="2" style="padding: 20px; font-size: 16px; line-height: 1.6; color: #333;">
          Hey Nixon, <br /><br />
          I just noticed you recently applied to join our program — I'm Mr. Yakubu. Congratulations on taking your first step to join this community!<br /><br />
          We've prepared some exclusive package contents just for you (and others like you). The product is entirely free, but there's a small one-time gateway fee of just <strong>$5</strong>.<br /><br />
          Feel free to reach out if you need help. To continue with the payment (if not already paid), simply click the link below:<br /><br />
          <a href="{{ url('resumepayment/initialize/'.$usertokenline) }}" style="color: #000; text-decoration: underline;">Click here to complete payment</a>
        </td>
      </tr>


{{-- information left for users to begin with --}}

      <tr>
        <td colspan="2" align="center" style="padding-bottom: 20px">
            Follow us Today
        </td>
      </tr>
      
        <tr>
         <td colspan="2" align="center">
            <table>
                <td align="center" colspan="2" style="padding: 10px;">
                    <a href="https://facebook.com/yourpage">
                      <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="32" height="32" alt="Facebook" style="display:block;" />
                    </a>
                  </td>
                  <td align="center" style="padding: 10px;">
                    <a href="https://x.com/yourhandle">
                      <img src="https://cdn-icons-png.flaticon.com/512/5968/5968958.png" width="32" height="32" alt="X" style="display:block;" />
                    </a>
                  </td>
                  <td align="center" style="padding: 10px;">
                    <a href="https://wa.me/yourphonenumber">
                      <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" width="32" height="32" alt="WhatsApp" style="display:block;" />
                    </a>
                  </td>
                  <td align="center" style="padding: 10px;">
                    <a href="https://instagram.com/yourprofile">
                      <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" width="32" height="32" alt="Instagram" style="display:block;" />
                    </a>
                  </td>
                  <td align="center" style="padding: 10px;">
                    <a href="https://youtube.com/yourchannel">
                      <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" width="32" height="32" alt="YouTube" style="display:block;" />
                    </a>
                  </td>
            </table>
         </td>
        </tr>
      
    </table>
  </div>

</body>
</html>
