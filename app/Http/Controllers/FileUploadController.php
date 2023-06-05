<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Storage;
use Throwable;

class FileUploadController extends Controller {
  public static string $tmpFileDir = 'public/media/tmp/';
  public function process(Request $request): string {
    $returnFolder = 0;
    if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
      $file = $request->file('attachment');
      $filename = $file->getClientOriginalName();
      $folder = uniqid() . '-' . now()->timestamp;
      $file->storeAs(FileUploadController::$tmpFileDir . $folder, $filename);

      $tmp = TemporaryFile::create([
        'folder' => $folder,
        'filename' => $filename,
      ]);
      $returnFolder = $tmp->id;
    }
    return $returnFolder;
  }

  /**
   * @throws Throwable
   */
  public function revert(Request $request): void {
    $tmpFileId = $request->getContent();
    $file = TemporaryFile::findOrFail($tmpFileId);
    Storage::deleteDirectory(FileUploadController::$tmpFileDir . $file->folder);
    $file->deleteOrFail();
  }
}
