<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\PandingCart;
use App\Models\PayCurrencie;
use App\Models\Purchase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PayCurrencieController extends Controller
{
    public function index(): View
    {
        $pay_currencie = PayCurrencie::all();

        return view('dashboard.pay_currencie.index', compact('pay_currencie'));
    } //endof index

    public function edit(PayCurrencie $payCurrencie): View
    {
        return view('dashboard.pay_currencie.edit', compact('payCurrencie'));
    } //end of edit

    public function update(Request $request, PayCurrencie $payCurrencie): RedirectResponse
    {
        $request->validate([
            'link' => 'required',
        ]);

        try {

            if ($request->image) {

                $file_name = time().'.'.$request->image->getClientOriginalExtension();

                $request->image->move(public_path('uploads/PayCurrencie_images/'), $file_name);

                $payCurrencie->update([

                    'image' => $file_name,
                    'link' => $request->link,
                ]);

            } else {

                $payCurrencie->update([
                    'link' => $request->link,
                ]);
            }

            notify()->success(__('home.updated_successfully'));

            return redirect()->route('dashboard.pay_currencie.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    } //end of update

    public function pending_requests(): View
    {
        $pending_requests = Purchase::where('status', 1)
            ->select('number', 'newTotalwithTax', 'purchases_status', 'date')
            ->distinct()->latest()->get();
        // dd($pending_requests);

        return view('dashboard.pending_requests.index', compact('pending_requests'));
    }

    public function pending_requests_edit($number): RedirectResponse
    {
        $pending_requests = Purchase::where('status', 1)->where('number', $number)->get();

        $email = Purchase::where('status', 1)->where('number', $number)->first();

        foreach ($pending_requests as $request) {

            $request->update([
                'status' => 0,
            ]);
        }

        Mail::send(new PandingCart($pending_requests, $email));

        notify()->success(__('home.updated_successfully'));

        return redirect()->route('dashboard.pending_requests');
    }

    public function not_exept($number): RedirectResponse
    {

        $pending_requests = Purchase::where('status', 1)->where('number', $number)->get();

        foreach ($pending_requests as $request) {

            $request->update([
                'status' => 0,
                'purchases_status' => 3,
            ]);
        }

        notify()->success(__('home.updated_successfully'));

        return redirect()->route('dashboard.pending_requests');

    }

    public function pay_currencie_details($number): View
    {

        $purchases = Purchase::where('number', $number)->get();

        return view('dashboard..pending_requests.details', compact('purchases'));

    }
} //end of controller
