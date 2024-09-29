<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupZipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to backup database into a zip file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupPath = storage_path('app/backups');
        $timestamp = date('Y-m-d-His');
        $backupFile = "backup_{$timestamp}.zip";

        if (!file_exists($backupPath)) {
            try {
                mkdir($backupPath, 0755, true);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                return;
            }
        };

        $files = Storage::allFiles('/');
        $zip = new \ZipArchive();
        
        $zip->open($backupPath . '/' . $backupFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($files as $file) {;
            try {
                $zip->addFile(storage_path('/app' . $file), $file);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                return;
            }
        }

        $zip->close();
        $this->info('Backup created successfully: ' . $backupFile);
    }
}
