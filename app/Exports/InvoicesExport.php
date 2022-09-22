<?php

namespace App\Exports;

use App\Models\Application;
use App\Models\Call;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{

    public function __construct(string $call)
    {
        //$this->type = $type;
        $this->call = $call;
        //$this->row = '0';
    }

    public function view(): View
    {
        $invoices = Application::where('call_id', $this->call)
                    ->get()
                    ->sortByDesc('statuses.status_id');
        $call = Call::find($this->call);

        return view('pdf', [
            'invoices' => $invoices,
            'call' => $call
        ]);
    }

}
