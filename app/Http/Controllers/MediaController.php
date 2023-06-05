<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Task;
use App\Models\TemporaryFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Storage;

class MediaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
      //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
      //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): JsonResponse {
    $tmpIds = $request->tmp_files;
    if (empty($tmpIds))
      return response()->json(['message' => 'No files were uploaded'], 400);

    $class = null;
    if ($request->exists('task_id')) $class = Task::find($request->task_id);
    if ($request->exists('phase_id')) $class = Phase::find($request->phase_id);
    if (empty($class))
      return response()->json(['message' => 'No class was found'], 400);

    $tmpFiles = TemporaryFile::find($tmpIds);
    $tmpFiles->each(function ($file) use ($class) {
      /** @var TemporaryFile $file */
      $class->addMediaToCollection($file->path());
      $file->delete();
    });

//    $class->attachments()->createMany(
//      array_map(function ($file) use ($tmpFiles) {
//        $tmp = $tmpFiles->find($file->id);
//        $folder = $tmp->folder;
//        $tmp->move($folder, $file->name);
//
//        return [
//          'path'      => $folder . '/' . $file->name,
//          'name'      => $file->name,
//          'size'      => $file->size,
//          'type'      => $file->type,
//          'extension' => $file->extension
//        ];
//      }, $files)
//    );

    return response()->json(['message' => 'Files uploaded successfully']);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
      //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id) {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id) {
      //
  }
}
