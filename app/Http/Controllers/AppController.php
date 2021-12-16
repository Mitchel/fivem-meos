<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Report;
use App\Models\Warant;
use App\Models\Warrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $recentProfiles = Profile::orderBy('created_at', 'desc')->limit(5)->get()->all();

        return view('app.dashboard')->with([
            'recentProfiles' => $recentProfiles,
        ]);
    }

    // Profiles

    public function profiles(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.profiles.overview');
    }

    public function profilesView($citizen_number)
    {
        $showprofile = Profile::where('citizen_number', $citizen_number)->get();
        $showreport = Report::where('citizen_number', $citizen_number)->get();
        $reportstotal = Report::where('citizen_number', $citizen_number)->count();
        $showwarant = Warrant::where('citizen_number', $citizen_number)->get();

        return view('app.profiles.view')->with([
            'showprofile' => $showprofile,
            'showreport' => $showreport,
            'reportstotal' => $reportstotal,
            'showwarrant' => $showwarant,
            'citizen_number' => $citizen_number
        ]);
    }

    public function profilesCreate(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.profiles.create');
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

    public function profilesDelete(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.profiles.delete');
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

    public function reportsCreate(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Post method maken.
        }

        return view('app.reports.create');
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
