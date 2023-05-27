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
                    <br>
                    <p style="font-size: 16px; color: #666666;">To set up your copy, please follow these steps:</p>
                    <ol style="font-size: 16px; color: #666666; margin-left: 20px;">
                        <li>Comment the code that exists in the boot() function in the WebSettingsProvider.php file.
                        </li>
                        <li>Configure your database connection in the .env file:</li>
                        <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=root
DB_PASSWORD=
                        </pre>
                        <li>Run the following command in the project path:</li>
                        <pre>php artisan migrate</pre>
                        <li>Run the following command in the project path:</li>
                        <pre>php artisan db:seed --class=DatabaseSeeder</pre>
                        <li>Start the project by running the following command:</li>
                        <pre>php artisan serve --port=8000</pre>
                        <li>Open the following URL in your browser:</li>
                        <pre>http://127.0.0.1:8000/cpanel/login</pre>
                        <li>Sign in with the following credentials:</li>
                        <pre>
Username: coupons@auto.com.ps
Password: Laravel0599!
                        </pre>
                        <li>Configure your email settings in the .env file:</li>
                        <pre>
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
                        </pre>
                        <li>Enjoy! :)</li>
                    </ol>
                    <br>
                    <p style="font-size: 16px; color: #666666;">Developed by: Ahmed Z. A. Almabhouh, Fares W. Alghrbawi
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
