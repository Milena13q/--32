<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class ExportOrderController extends Controller
{
    /**
     * @param int $id
     * @return View
     */
    public function __invoke(int $id): View
    {
        $response = Order::query()
            ->with('orderItems')
            ->find($id);

        return view('export.order', compact('response'));
    }
}
