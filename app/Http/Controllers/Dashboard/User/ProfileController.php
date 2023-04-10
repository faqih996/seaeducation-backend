<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Requests\Profile\UpdateDetailUserRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;
use File;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Emergency;

class ProfileController extends Controller
{
    public function _construct()
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
        $user = User::where('id', Auth::user()->id)->first();
        $experience_user = ExperienceUser::where(
            'detail_user_id',
            $user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();
        $education_user = Educations::where(
            'detail_user_id',
            $user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();
        $emergency_user = Emergencies::where(
            'detail_user_id',
            $user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();

        // dd($experience_user, $education_user, $emergency_user, $document_user);

        return view(
            'pages.profile.index',
            compact(
                'user',
                'experience_user',
                'education_user',
                'emergency_user'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = User::where('id', Auth::user()->id)->first();

        $data_detail_user = DetailUser::findOrFail($id);

        $experience_user = ExperienceUser::where(
            'detail_user_id',
            $data_user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();
        $education_user = Educations::where(
            'detail_user_id',
            $data_user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();
        $emergency_user = Emergencies::where(
            'detail_user_id',
            $data_user->detail_user->id
        )
            ->OrderBy('id', 'asc')
            ->get();

        // dd($data_user);
        // dd($experience_user);
        // dd($emergency_user);
        // dd($document_user);
        // dd($education_user);

        return view(
            'pages.profile.edit',
            compact(
                'data_user'
                // 'experience_user',
                // 'education_user',
                // 'emergency_user'
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
    public function update(
        UpdateProfileRequest $profileRequest,
        UpdateDetailUserRequest $requestdetailuser
    ) {
        $data_user = $profileRequest->all();
        $data_detail_user = $requestdetailuser->all();

        // process save to user
        $user = User::find(Auth::user()->id);
        $user->update($data_user);

        // process save to Detail User
        $detail_user = DetailUser::find($user->detail_user->id);
        $detail_user->update($data_detail_user);

        return redirect()->route('profile.index');
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

    public function delete($id)
    {
        //
    }
}