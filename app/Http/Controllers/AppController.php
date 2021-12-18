<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Models\Profile;
use App\Models\Properties;
use App\Models\Report;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Warrant;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $recentProfiles = Profile::orderBy('last_search', 'desc')->limit(5)->get()->all();
        $recentReports = Report::orderBy('last_search', 'desc')->limit(5)->get()->all();

        $statsReports = Report::get()->count();
        $statsProfiles = Profile::get()->count();
        $statsLaws = Law::get()->count();
        $statsUsers = User::get()->count();

        return view('app.dashboard')->with([
            'recentProfiles' => $recentProfiles,
            'recentReports' => $recentReports,
            'statsReports' => $statsReports,
            'statsProfiles' => $statsProfiles,
            'statsLaws' => $statsLaws,
            'statsUsers' => $statsUsers,
        ]);
    }

    // Profiles

    public function profiles(Request $request)
    {
        if($request->isMethod('post')) {
            $attributes = request()->validate([
                'fullname'              => ['required', 'min:3', 'max:255'],
                'citizen_number'        => ['required', 'min:3', 'max:255'],
                'picture'               => ['min:1', 'max:255'],
                'birthday'              => ['required'],
                'gender'                => ['required'],
                'nationality'           => ['required', 'min:3', 'max:255'],
                'phone_number'          => ['required', 'min:3', 'max:255'],
                'fingerprint'           => ['required', 'min:3', 'max:255'],
                'dna_code'              => ['required', 'min:3', 'max:255'],
            ]);

            $profile = Profile::create($attributes);
            $profile->last_search = now('Europe/Amsterdam')->format('d-m-Y H:i:s');
            $profile->save();

            return redirect()->route('profiles.overview')->with('success', 'Profiel is zojuist succesvol aangemaakt.');
        }

        $profiles = Profile::orderBy('last_search', 'desc')->limit(10)->get()->all();

        return view('app.profiles.overview')->with([
            'profiles' => $profiles,
        ]);
    }

    public function profilesView($citizen_number, Request $request)
    {
        if($request->isMethod('get')) {
            $profile = Profile::where('citizen_number', $citizen_number)->first();
            $profile->last_search = now('Europe/Amsterdam')->format('d-m-Y H:i:s');
            $profile->save();
        }

        $showprofile = Profile::where('citizen_number', $citizen_number)->get();
        $showreport = Report::where('citizen_number', $citizen_number)->get();
        $reportstotal = Report::where('citizen_number', $citizen_number)->count();
        $showwarant = Warrant::where('citizen_number', $citizen_number)->get();
        $showvehicles = Vehicle::where('citizen_number', $citizen_number)->get();
        $showproperties = Properties::where('citizen_number', $citizen_number)->get();

        return view('app.profiles.view')->with([
            'showprofile' => $showprofile,
            'showreport' => $showreport,
            'reportstotal' => $reportstotal,
            'showwarrant' => $showwarant,
            'showvehicles' => $showvehicles,
            'showproperties' => $showproperties,
            'citizen_number' => $citizen_number
        ]);
    }

    public function profilesEdit(Request $request, $citizen_number)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.profiles.edit')->with([
            'citizen_number' => $citizen_number
        ]);
    }

    public function profilesDelete(Request $request, $citizen_number)
    {
        Profile::where('citizen_number', $citizen_number)->delete($request->all());
        return redirect()->route('profiles.overview')->with('success', 'Profiel succesvol verwijdert.');
    }

    // Reports

    public function reports(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.reports.overview');
    }

    public function reportsView($report_number)
    {
        return view('app.reports.view')->with([
            'report_number' => $report_number
        ]);
    }

    public function reportsEdit(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.reports.edit');
    }

    public function reportsDelete(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.reports.delete');
    }
}
