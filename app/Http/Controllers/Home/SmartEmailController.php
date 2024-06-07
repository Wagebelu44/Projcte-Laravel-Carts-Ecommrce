<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\SmartEmailJob;
use App\Models\SmartEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SmartEmailController extends Controller
{
    public function index(Request $request)
    {

        $emails = SmartEmail::latest()->when($request->search, function ($q) use ($request) {

            return $q->where('text', 'like', '%'.$request->search.'%');

        })->latest()->paginate(10);

        return view('dashboard.SmartEmail.index', compact('emails'));

    }//end of index

    public function create(): View
    {

        $emails = SmartEmail::latest()->get();

        return view('dashboard.SmartEmail.create', compact('emails'));

    }//end of creqate

    public function store(Request $request): RedirectResponse
    {

        $emails = SmartEmail::latest()->get();

        $email = new SmartEmail();

        $email->text = $request->text;

        $email->save();

        $email = $request->text;

        dispatch(new SmartEmailJob($email));

        notify()->success(__('home.added_successfully'));

        return redirect()->route('SmartEmail.index');

    } //end of store

} //end of controller
