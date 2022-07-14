<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePayable;
use App\Models\Payable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PayableController extends Controller
{
    public function create(CreatePayable $request)
    {
        $payable = new Payable();
        $payable->bar_code = $request->bar_code;
        $payable->status = $request->status;
        $payable->service_type = $request->service_type;
        $payable->service_description = $request->service_description;
        $payable->expires_at = Carbon::parse($request->expires_at);
        $payable->service_amount = $request->service_amount;
        $payable->save();
    }

    public function list_pending($service_type = null)
    {
        if(is_null($service_type)) {
            return Payable::where('status', 'pending')
                ->select('bar_code', 'service_amount', 'expires_at', 'service_type')
                ->get();
        }
        return Payable::where('status', 'pending')->where('service_type', $service_type)
            ->select('bar_code', 'service_amount', 'expires_at')
            ->get();
    }
}
