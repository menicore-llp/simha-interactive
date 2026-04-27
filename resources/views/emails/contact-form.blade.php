<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Request</title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            background-color: #080808; 
            color: #ffffff; 
            margin: 0; 
            padding: 0; 
        }
        .container { 
            max-width: 600px; 
            margin: 40px auto; 
            background-color: #111111; 
            border: 1px solid #1f1f1f;
            border-radius: 12px; 
            overflow: hidden; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); 
        }
        .header { 
            background-color: #111111; 
            padding: 40px 20px; 
            text-align: center; 
            border-bottom: 1px solid #1f1f1f;
        }
        .header h1 { 
            margin: 0; 
            font-size: 28px; 
            font-weight: 700; 
            letter-spacing: 2px; 
            color: #ffffff;
            text-transform: uppercase;
        }
        .header .accent {
            color: #FF5C1A;
        }
        .content { 
            padding: 40px 30px; 
            line-height: 1.8; 
        }
        .content p { 
            margin: 0 0 20px; 
            font-size: 16px; 
            color: #a0a0a0;
        }
        .details-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 30px; 
            background-color: #0d0d0d;
            border-radius: 8px;
            overflow: hidden;
        }
        .details-table th, .details-table td { 
            padding: 15px 20px; 
            text-align: left; 
            border-bottom: 1px solid #1f1f1f; 
        }
        .details-table th { 
            background-color: #161616; 
            font-weight: 600; 
            color: #FF5C1A; 
            width: 35%; 
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .details-table td { 
            font-weight: 400; 
            color: #ffffff; 
            font-size: 15px;
        }
        .message-box {
            background-color: #161616;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #FF5C1A;
            margin-top: 10px;
            color: #ffffff;
            white-space: pre-wrap;
        }
        .footer { 
            background-color: #0d0d0d; 
            padding: 25px; 
            text-align: center; 
            font-size: 12px; 
            color: #555555; 
            border-top: 1px solid #1f1f1f; 
        }
        .footer p { margin: 0; }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #FF5C1A;
            color: #ffffff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin-top: 25px;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SIMHA <span class="accent">INTERACTIVE</span></h1>
            <div style="font-size: 12px; color: #555555; margin-top: 10px; letter-spacing: 3px; text-transform: uppercase;">New Project Inquiry</div>
        </div>
        <div class="content">
            <p>Hello Admin,</p>
            <p>A new potential client has reached out through the Simha Interactive contact form. Here are the submission details:</p>
            
            <table class="details-table">
                <tr>
                    <th>Full Name</th>
                    <td>{{ $data['name'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:{{ $data['email'] ?? '' }}" style="color: #ffffff; text-decoration: underline;">{{ $data['email'] ?? 'N/A' }}</a></td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $data['company'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>{{ $data['service'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Budget</th>
                    <td>{{ $data['budget'] ?? 'N/A' }}</td>
                </tr>
            </table>

            <div style="margin-top: 30px;">
                <div style="font-size: 13px; color: #FF5C1A; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Project Details:</div>
                <div class="message-box">{!! nl2br(e($data['message'] ?? 'N/A')) !!}</div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Simha Interactive. All rights reserved.</p>
            <p style="margin-top: 5px;">This is an automated notification from your website.</p>
        </div>
    </div>
</body>
</html>
