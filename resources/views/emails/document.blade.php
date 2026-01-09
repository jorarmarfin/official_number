<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficios - Dirección de Admisión UNI</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f4f4;
            padding: 20px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 30px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .header .badge {
            display: inline-block;
            background-color: #fbbf24;
            color: #1e3a8a;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }
        .content {
            padding: 30px 25px;
        }
        .info-box {
            background-color: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .info-row {
            margin-bottom: 12px;
        }
        .info-row:last-child {
            margin-bottom: 0;
        }
        .info-label {
            font-weight: 600;
            color: #1e3a8a;
            font-size: 14px;
            display: inline-block;
            min-width: 140px;
        }
        .info-value {
            color: #334155;
            font-size: 14px;
            display: inline;
        }
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 20px 0;
        }
        .message-text {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 25px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        .footer-text {
            color: #64748b;
            font-size: 13px;
            margin: 5px 0;
            line-height: 1.5;
        }
        .footer-logo {
            margin-top: 15px;
        }
        .uni-logo {
            width: 50px;
            height: auto;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: 0 !important;
                border-radius: 0 !important;
            }
            .content {
                padding: 20px 15px !important;
            }
            .info-label {
                display: block;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <table class="email-wrapper" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td align="center">
                <table class="email-container" cellpadding="0" cellspacing="0" border="0" width="600">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <h1>{{ $document->range }}</h1>
                            <span class="badge">Dirección de Admisión</span>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td class="content">
                            <p class="message-text">
                                Estimado(a),
                            </p>

                            <p class="message-text">
                                Por medio de la presente, le informamos que se ha generado el siguiente documento oficial:
                            </p>

                            <div class="info-box">
                                <div class="info-row">
                                    <span class="info-label">Número de oficio(s):</span>
                                    <span class="info-value">{{ $document->range }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">ASUNTO:</span>
                                    <span class="info-value">{{ $document->subject }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Fecha:</span>
                                    <span class="info-value">{{ $document->created_at->format('d/m/Y H:i:s') }}</span>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <p class="message-text">
                                Este correo es generado automáticamente por el sistema de gestión de oficios de la
                                <strong>Dirección de Admisión de la Universidad Nacional de Ingeniería</strong>.
                            </p>

                            <p class="message-text" style="margin-bottom: 0;">
                                Si tiene alguna consulta, por favor comuníquese con nuestra oficina.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            <div class="footer-logo">
                                <img src="{{ asset('escudo-uni.png') }}" alt="UNI Logo" class="uni-logo">
                            </div>
                            <p class="footer-text">
                                <strong>Universidad Nacional de Ingeniería</strong><br>
                                Dirección de Admisión<br>
                                Lima - Perú
                            </p>
                            <p class="footer-text" style="font-size: 11px; color: #94a3b8; margin-top: 15px;">
                                Este es un correo automático, por favor no responder a esta dirección.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

