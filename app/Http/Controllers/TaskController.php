<?php

namespace App\Http\Controllers;

use App\Task; 
use App\TaskUser;
use App\TemporaryFile;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::paginate(5);

        return view('pages.home', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian_kegiatan' => 'required',
            'sumber' => 'required',
            'jatuh_tempo' => 'required',
        ]);

        $newTask = Task::create([
           'uraian_kegiatan' => request('uraian_kegiatan'),
           'sumber' => request('sumber'),
           'jatuh_tempo' => request('jatuh_tempo'),
        ]);

        $temporaryFile = TemporaryFile::where('folder', $request->berkas)->first();

        if ($temporaryFile) {
            $newTask
                ->addMedia(storage_path('app/berkas/tmp/' . $request->berkas . '/' . $temporaryFile->filename))
                ->toMediaCollection('berkas');
            rmdir(storage_path('app/berkas/tmp/' . $request->berkas));
            $temporaryFile->delete();
        }


        return redirect('task')->with('status', 'Task successfully created.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request) {
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('berkas/tmp/' . $folder, $filename);
            
            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';

    }

    public function download(Request $request)
    {
        $asset = Task::findOrFail($request->id);
        $imagesToDownload = $asset->getMedia('berkas');
        $time = now()->timestamp;

        return MediaStream::create( 'File-' . $time . '.zip')->addMedia($imagesToDownload);
    }
}
