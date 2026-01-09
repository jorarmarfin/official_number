<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Solicitud de Número de Oficio - Dirección de Admisión</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <style>
            :root {
                --primary: #761607;
                --primary-dark: #5a1105;
                --primary-light: #8f1c09;
                --primary-lighter: #a82410;
                --primary-bg: #fef2f0;
                --primary-border: #e8c4be;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #fef7f6 0%, #fff5f3 50%, #fef2f0 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .container {
                width: 100%;
                max-width: 480px;
            }

            .card {
                background: #ffffff;
                border-radius: 20px;
                box-shadow: 0 25px 50px -12px rgba(118, 22, 7, 0.15),
                            0 0 0 1px rgba(118, 22, 7, 0.05);
                overflow: hidden;
            }

            .card-header {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                padding: 32px 32px 28px;
                text-align: center;
            }

            .logo-placeholder {
                width: 80px;
                height: 80px;
                background: rgba(255, 255, 255, 0.15);
                border-radius: 16px;
                margin: 0 auto 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                backdrop-filter: blur(10px);
                border: 2px dashed rgba(255, 255, 255, 0.3);
            }

            .logo-placeholder svg {
                width: 40px;
                height: 40px;
                color: rgba(255, 255, 255, 0.6);
            }

            .card-header h1 {
                color: #ffffff;
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 8px;
                letter-spacing: -0.02em;
            }

            .card-header p {
                color: rgba(255, 255, 255, 0.85);
                font-size: 0.9rem;
                font-weight: 400;
            }

            .card-body {
                padding: 32px;
            }

            .form-group {
                margin-bottom: 24px;
            }

            .form-group:last-of-type {
                margin-bottom: 28px;
            }

            .form-label {
                display: block;
                font-size: 0.875rem;
                font-weight: 600;
                color: #374151;
                margin-bottom: 8px;
            }

            .form-label .required {
                color: var(--primary);
                margin-left: 2px;
            }

            .form-input {
                width: 100%;
                padding: 14px 16px;
                font-size: 1rem;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                background: #fafafa;
                color: #1f2937;
                transition: all 0.2s ease;
                outline: none;
            }

            .form-input::placeholder {
                color: #9ca3af;
            }

            .form-input:hover {
                border-color: #d1d5db;
                background: #ffffff;
            }

            .form-input:focus {
                border-color: var(--primary);
                background: #ffffff;
                box-shadow: 0 0 0 4px rgba(118, 22, 7, 0.1);
            }

            .form-input.error {
                border-color: #ef4444;
                background: #fef2f2;
            }

            .input-icon-wrapper {
                position: relative;
            }

            .input-icon-wrapper .form-input {
                padding-left: 48px;
            }

            .input-icon {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                width: 20px;
                height: 20px;
                color: #9ca3af;
                pointer-events: none;
                transition: color 0.2s ease;
            }

            .input-icon-wrapper:focus-within .input-icon {
                color: var(--primary);
            }

            .error-message {
                color: #ef4444;
                font-size: 0.8rem;
                margin-top: 6px;
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .btn-submit {
                width: 100%;
                padding: 16px 24px;
                font-size: 1rem;
                font-weight: 600;
                color: #ffffff;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                border: none;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .btn-submit:hover {
                background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
                transform: translateY(-2px);
                box-shadow: 0 10px 25px -5px rgba(118, 22, 7, 0.4);
            }

            .btn-submit:active {
                transform: translateY(0);
            }

            .btn-submit svg {
                width: 20px;
                height: 20px;
            }

            .alert {
                padding: 16px;
                border-radius: 12px;
                margin-bottom: 24px;
                display: flex;
                align-items: flex-start;
                gap: 12px;
            }

            .alert-success {
                background: #ecfdf5;
                border: 1px solid #a7f3d0;
                color: #065f46;
            }

            .alert-error {
                background: #fef2f2;
                border: 1px solid #fecaca;
                color: #991b1b;
            }

            .alert svg {
                width: 20px;
                height: 20px;
                flex-shrink: 0;
                margin-top: 1px;
            }

            .alert-content {
                flex: 1;
            }

            .alert-title {
                font-weight: 600;
                margin-bottom: 4px;
            }

            .alert-message {
                font-size: 0.875rem;
            }

            .card-footer {
                padding: 20px 32px;
                background: #f9fafb;
                border-top: 1px solid #f3f4f6;
                text-align: center;
            }

            .card-footer p {
                color: #6b7280;
                font-size: 0.8rem;
            }

            .helper-text {
                color: #6b7280;
                font-size: 0.75rem;
                margin-top: 6px;
            }

            @media (max-width: 520px) {
                .card-header {
                    padding: 24px 20px 22px;
                }

                .card-header h1 {
                    font-size: 1.25rem;
                }

                .card-body {
                    padding: 24px 20px;
                }

                .logo-placeholder {
                    width: 64px;
                    height: 64px;
                }

                .logo-placeholder svg {
                    width: 32px;
                    height: 32px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <!-- Logo Placeholder -->
                    <div>
                        <img src="{{asset('/escudo-uni.png')}}" width="60px" alt="Logo">
                    </div>
                    <h1>Solicitud de Número de Oficio</h1>
                    <p>Dirección de Admisión</p>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <div class="alert-content">
                                <div class="alert-title">¡Solicitud enviada!</div>
                                <div class="alert-message">{{ session('success') }}</div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <div class="alert-content">
                                <div class="alert-title">Error en el formulario</div>
                                <div class="alert-message">Por favor, corrija los errores indicados.</div>
                                {{$errors}}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('solicitud.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="asunto">
                                Asunto <span class="required">*</span>
                            </label>
                            <div class="input-icon-wrapper">
                                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                <input
                                    type="text"
                                    id="asunto"
                                    name="asunto"
                                    class="form-input @error('asunto') error @enderror"
                                    placeholder="Ej: Solicitud de información académica"
                                    value="{{ old('asunto') }}"
                                    required
                                >
                            </div>
                            @error('asunto')
                                <div class="error-message">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="cantidad_oficios">
                                Cantidad de Oficios <span class="required">*</span>
                            </label>
                            <div class="input-icon-wrapper">
                                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                </svg>
                                <input
                                    type="number"
                                    id="cantidad_oficios"
                                    name="cantidad_oficios"
                                    class="form-input @error('cantidad_oficios') error @enderror"
                                    placeholder="Ej: 5"
                                    min="1"
                                    value="{{ old('cantidad_oficios') }}"
                                    required
                                >
                            </div>
                            <p class="helper-text">Ingrese la cantidad de números de oficio que necesita</p>
                            @error('cantidad_oficios')
                                <div class="error-message">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">
                                Correo Electrónico <span class="required">*</span>
                            </label>
                            <div class="input-icon-wrapper">
                                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-input @error('email') error @enderror"
                                    placeholder="correo@ejemplo.com"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                            <p class="helper-text">Recibirá la confirmación de su solicitud en este correo</p>
                            @error('email')
                                <div class="error-message">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            Enviar Solicitud
                        </button>
                    </form>
                </div>

                <div class="card-footer">
                    <p>Este formulario es exclusivo para las áreas de la oficina de la Dirección de Admisión</p>
                </div>
            </div>
        </div>
    </body>
</html>

