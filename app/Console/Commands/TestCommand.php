<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {email? : Email de destino}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un email de prueba para validar la configuración SMTP';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?? $this->ask('¿A qué email deseas enviar el correo de prueba?');

        $this->info('Enviando email de prueba a: ' . $email);

        try {
            Mail::raw('Este es un correo de prueba para validar la configuración SMTP. Fecha: ' . now()->format('Y-m-d H:i:s'), function ($message) use ($email) {
                $message->to($email)
                    ->subject('Prueba SMTP - ' . config('app.name'));
            });

            $this->info('✅ Email enviado correctamente. Revisa tu bandeja de entrada.');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('❌ Error al enviar el email: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
