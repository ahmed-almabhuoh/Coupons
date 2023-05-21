<!DOCTYPE html>
<html>

<head>
    <title>Link Availability Notification</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px;">
        <table
            style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-collapse: collapse;">
            <tr>
                <td style="padding: 20px;">
                    <h1 style="color: #333333;">Link Availability Notification</h1>
                    <p style="font-size: 16px; color: #666666;">Dear <?php echo substr($email, 0, strpos($email, '@')); ?>,</p>
                    <p style="font-size: 16px; color: #666666;">We are pleased to inform you that the link you have been
                        waiting for is now available.</p>
                    <p style="font-size: 16px; color: #666666;">You can access it by clicking the following link:</p>
                    <p style="font-size: 16px; color: #666666;"><a href="{{ $url }}"
                            style="color: #0066cc; text-decoration: none;">Click here to access the link</a></p>
                    <p style="font-size: 16px; color: #666666;">Thank you for your patience. If you have any questions
                        or need further assistance, please feel free to contact us.</p>
                    <p style="font-size: 16px; color: #666666;">Best regards,</p>
                    <p style="font-size: 16px; color: #666666;"><a href="{{ env('APP_URL') }}">Coupons ORG.</a></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
