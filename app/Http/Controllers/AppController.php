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
use Illuminate\Support\Facades\DB;

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

    public function statics()
    {
        return view('app.statics')->with([

        ]);
    }

    public function profile(Request $request)
    {
        if($request->isMethod('get')) {
            $profile = User::where('id', auth()->user()->id)->first();
            $profile->last_search = now('Europe/Amsterdam')->format('d-m-Y H:i:s');
            $profile->save();
        }

        $showreports = Report::where('created_by', auth()->user()->fullname)->get();
        $reportstotal = Report::where('created_by', auth()->user()->fullname)->count();

        return view('app.profile')->with([
            'showreports' => $showreports,
            'reportstotal'  => $reportstotal,
        ]);
    }

    // Detective

    public function detective()
    {
        $detectivesupervisor = User::where('detective_supervisor', '=', 1)->get();
        $detectives = User::where('detective', '=', '1')->where('detective_supervisor', '=', 0)->get();

        return view('app.detective.overview')->with([
            'detectivesupervisor' => $detectivesupervisor,
            'detectives' => $detectives
        ]);
    }

    // Supervisor

    public function laws(Request $request)
    {
        if($request->isMethod('post')) {
            $attributes = request()->validate([
                'name'             => ['required', 'min:3', 'max:255'],
                'fine'              => ['required', 'min:1', 'max:25'],
                'months'            => ['required', 'min:1', 'max:25'],
                'description'       => ['required', 'min:1', 'max:1000'],
            ]);

            $laws = Law::create($attributes);
            $laws->save();

            return redirect()->route('supervisor.laws')->with('success', 'Straf is zojuist succesvol toegevoegd');
        }

        $showlaws = Law::get()->all();

        return view('app.supervisor.laws')->with([
            'showlaws'  => $showlaws,
        ]);
    }

    public function lawsEdit(Request $request, $id)
    {
        $laws = Law::where('id', $id)->firstOrFail();

        if($request->isMethod('post')) {
            $this->validate($request, [
                'name'              => ['required', 'min:3', 'max:255'],
                'fine'              => ['required', 'min:1', 'max:25'],
                'months'            => ['required', 'min:1', 'max:25'],
                'description'       => ['required', 'min:1', 'max:1000'],
            ]);

            $laws_data = [
                'name'              => $request->name,
                'fine'              => $request->fine,
                'months'            => $request->months,
                'description'       => $request->description,
            ];

            Law::where('id', $id)->update($laws_data);
            return redirect()->route('supervisor.laws')->with('success', 'Straf is zojuist succesvol aangepast');
        }

        return view('app.supervisor.edit')->with([
            'id'    => $id,
            'laws'  => $laws,
        ]);
    }

    public function lawsDelete(Request $request, $id)
    {
        Law::where('id', $id)->delete($request->all());
        return redirect()->route('supervisor.laws')->with('success', 'Straf is succesvol verwijdert');
    }

    public function colleagues()
    {
        $colleagues = User::get()->all();

        return view('app.supervisor.colleagues')->with([
            'colleagues' => $colleagues,
        ]);
    }

    public function colleaguesView($citizen_number, Request $request)
    {
        if($request->isMethod('get')) {
            $profile = User::where('citizen_number', $citizen_number)->first();
            $profile->last_search = now('Europe/Amsterdam')->format('d-m-Y H:i:s');
            $profile->save();
        }

        $profile = User::where('citizen_number', $citizen_number)->get();

        return view('app.supervisor.view')->with([
            'citizen_number' => $citizen_number,
            'profile'   => $profile,
        ]);
    }

    // Warrants

    public function warrantsOverview()
    {
        return view('app.warrants.overview')->with([

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

        $totalpenalty = Report::where('citizen_number', $citizen_number)->sum('penalty');
        $totalcell = Report::where('citizen_number', $citizen_number)->sum('cell');

        return view('app.profiles.view')->with([
            'showprofile' => $showprofile,
            'showreport' => $showreport,
            'reportstotal' => $reportstotal,
            'showwarrant' => $showwarant,
            'showvehicles' => $showvehicles,
            'showproperties' => $showproperties,
            'totalpenalty' => $totalpenalty,
            'totalcell' => $totalcell,
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

        $reports = Report::orderBy('last_search', 'desc')->limit(10)->get()->all();

        return view('app.reports.overview')->with([
            'reports'   => $reports,
        ]);
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
