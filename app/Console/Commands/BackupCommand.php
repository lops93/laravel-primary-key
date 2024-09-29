<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to backup database into a sql file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupPath = storage_path('backups');
        $timestamp = date('Y-m-d-His');
        $db = env('DB_DATABASE');
        $backupFile = $backupPath . "/backup_{$db}-{$timestamp}.zip";

        if (!is_dir($backupPath)) {
            mkdir($backupPath, 0755, true);
        };

        exec("mysqldump -u" . env('DB_USERNAME') . " -p" . env('DB_PASSWORD') . " " . env('DB_DATABASE') . " > " . $backupFile);
        $this->info('Backup created successfully: ' . $backupFile);
    }
}
