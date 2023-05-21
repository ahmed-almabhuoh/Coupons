<!DOCTYPE html>
<html>

<head>
    <title>Professional Email</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px;">
        <table
            style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-collapse: collapse;">
            <tr>
                <td style="padding: 20px;">
                    <h1 style="color: #333333;">Professional Email</h1>
                    <p style="font-size: 16px; color: #666666;">Dear <?php echo substr($email, 0, strpos($email, '@')); ?>,</p>
                    <p style="font-size: 16px; color: #666666;">Thank you for registering on our platform. Here are your
                        login details:</p>
                    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                        <tr style="background-color: #dddddd;">
                            <th style="padding: 10px; border: 1px solid #cccccc;">Username</th>
                            <th style="padding: 10px; border: 1px solid #cccccc;">Password</th>
                            <th style="padding: 10px; border: 1px solid #cccccc;">Serial</th>
                            <th style="padding: 10px; border: 1px solid #cccccc;">URL</th>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #cccccc;">{{ $username }}</td>
                            <td style="padding: 10px; border: 1px solid #cccccc;">{{ $password }}</td>
                            <td style="padding: 10px; border: 1px solid #cccccc;">{{ $serial }}</td>
                            <td style="padding: 10px; border: 1px solid #cccccc;"><a
                                    href="{{ $url }}">{{ $url }}</a></td>
                        </tr>
                    </table>
                    <p style="font-size: 16px; color: #666666;">Please keep this information secure and do not share it
                        with anyone.</p>
                    <p style="font-size: 16px; color: #666666;">If you have any questions or need assistance, feel free
                        to contact our support team.</p>
                    <p style="font-size: 16px; color: #666666;">Thank you for your attention.</p>
                    <p style="font-size: 16px; color: #666666;">Best regards,</p>
                    <p style="font-size: 16px; color: #666666;"><a href="{{ env('APP_URL') }}">Coupons ORG.</a></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
