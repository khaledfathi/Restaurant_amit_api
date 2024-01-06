<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Repository\contracts\HistoryOrderRepositoryContract;
use App\Repository\contracts\HistoryOrderRequestsRepositoryContract;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public HistoryOrderRepositoryContract $historyOrderProvider;
    public HistoryOrderRequestsRepositoryContract $historyOrderRequestsProvider;
    public function __construct(
        HistoryOrderRepositoryContract $historyOrderProvider,
        HistoryOrderRequestsRepositoryContract $historyOrderRequestsProvider,
    ) {
        $this->historyOrderProvider = $historyOrderProvider;
        $this->historyOrderRequestsProvider = $historyOrderRequestsProvider;
    }
    public function index()
    {
        $records = $this->historyOrderProvider->index();
        return view('order.index', ['records' => $records]);
    }
    public function fullDetails(Request $request)
    {
        $orderRecord = $this->historyOrderProvider->show($request->id);
        $orderRequestsRecords = $this->historyOrderRequestsProvider->filterByOrderId($request->id);
        return view('order.fullDetails', ['orderRecord' => $orderRecord, 'orderRequestsRecords' => $orderRequestsRecords]);
    }
}
