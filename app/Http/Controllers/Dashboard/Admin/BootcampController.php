<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Dashboard\Admin\BootcampRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;
use File;

use App\Models\Bootcamp;
use App\Models\BootcampBenefits;
use App\Models\BootcampLocations;
use App\Models\BootcampThumbnails;
use App\Models\Departments;
use App\Models\Positions;

class BootcampController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Bootcamp = Bootcamp::Orderby('created_at', 'desc')->get();

        return view('pages.bootcamp.index', compact('bootcamp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.bootcamp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BootcampRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user();

        $bootcamp = Bootcamp::create($data);

        // add to bootcamp benefits
        foreach ($data['bootcamp-benefit'] as $key => $value) {
            $bootcamp_benefit = new BootcampBenefits();
            $bootcamp_benefit->bootcamp_id = $bootcamp->id;
            $bootcamp_benefit->name = $value;
            $bootcamp_benefit->save();
        }

        // add thumbnail service
        if ($request->hasfile('thumbnail')) {
            foreach ($request->file('thumbnail') as $file) {
                $path = $file->store('assets/bootcamp/thumbnail', 'public');

                $bootcamp_thumbnail = new BootcampThumbnails();
                $bootcamp_thumbnail->bootcamp_id = $bootcamp['id'];
                $bootcamp_thumbnail->thumbnail = $path;
                $bootcamp_thumbnail->save();
            }
        }

        toast()->success('Save has been success');
        return redirect()->route('pages.bootcamp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bootcamp $bootcamp)
    {
        $bootcamp_benefit = BootcampBenefits::where(
            'bootcamp_id',
            $bootcamp['id']
        )->get();
        $bootcamp_thumbnail = BootcampThumbnails::where(
            'bootcamp_id',
            $bootcamp['id']
        )->get();

        return view(
            'pages.dashboard.bootcamp.edit',
            compact(
                'bootcamp_benefit',
                'bootcamp_location',
                'bootcamp_thumbnail'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BootcampRequest $request, Bootcamp $bootcamp)
    {
        $data = $request->all();

        $bootcamp->update($data);

        // update to advantage service
        foreach ($data['bootcamp-benefits'] as $key => $value) {
            $bootcamp_benefit = BootcampBenefits::find($key);
            $bootcamp_benefit->advantage = $value;
            $bootcamp_benefit->save();
        }

        // add to bootcamp benefits
        foreach ($data['bootcamp-benefit'] as $key => $value) {
            $bootcamp_benefit = new BootcampBenefits();
            $bootcamp_benefit->bootcamp_id = $bootcamp->id;
            $bootcamp_benefit->name = $value;
            $bootcamp_benefit->save();
        }

        // update to thumbail bootcamp
        if ($request->hasfile('thumbnails')) {
            foreach ($request->file('thumbnails') as $key => $file) {
                // get old photo thumbnail
                $get_photo = BootcampThumbnail::where('id', $key)->first();

                // store photo
                $path = $file->store('assets/bootcamp/thumbnail', 'public');

                // update photo
                $bootcamp_thumbnail = BootcampThumbnail::find($key);
                $bootcamp_thumbnail->thumbnail = $path;
                $bootcamp_thumbnail->save();

                // delete old photo thumbnail
                $data = 'storage/' . $get_photo['thumbnail'];
                if (File::exists($data)) {
                    File::delete($data);
                } else {
                    File::delete(
                        'storage/app/public/' . $get_photo['thumbnail']
                    );
                }
            }
        }

        // add new photo thumbnail
        if ($request->hasfile('thumbnail')) {
            foreach ($request->file('thumbnail') as $file) {
                $path = $file->store('assets/bootcamp/thumbnail', 'public');

                $bootcamp_thumbnail = new BootcampThumbnail();
                $bootcamp_thumbnail->bootcamp_id = $bootcamp['id'];
                $bootcamp_thumbnail->thumbnail = $path;
                $bootcamp_thumbnail->save();
            }
        }

        toast()->success('Update has been success');
        return redirect()->route('pages.bootcamp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}