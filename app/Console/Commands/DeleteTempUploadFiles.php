<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteTempUploadFiles extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:delete-temp-upload-files';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Delete temporary upload files';

  /**
   * Execute the console command.
   */
  public function handle(): void {
    foreach(Storage::directories('attachments/tmp') as $folder) {
      $lastModified = Carbon::createFromTimestamp(Storage::lastModified($folder));
      echo now()->diffInHours($lastModified);
//      if (now()->diffInHours($lastModified) > 12) {
      if (now()->diffInMinutes($lastModified) > 1) {
        Storage::deleteDirectory($folder);
      }
    }
  }
}
