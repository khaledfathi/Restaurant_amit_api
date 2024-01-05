<?php

namespace App\Http\Controllers\API;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreOrderRequest;
use App\Http\Requests\API\QueryParameter\IdRequest;
use App\Repository\contracts\HistoryOrderRepositoryContract;
use App\Repository\contracts\HistoryOrderRequestsRepositoryContract;
use App\Repository\contracts\OrderRepositoryContract;
use App\Repository\contracts\OrderRequestsRepositoryContract;
use App\Repository\contracts\ProductRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private OrderRepositoryContract $orderProvider;
    private OrderRequestsRepositoryContract $orderRequestsProvider;
    private HistoryOrderRepositoryContract $historyOrderProvider;
    private HistoryOrderRequestsRepositoryContract $historyOrderRequestsProvider;
    private ProductRepositoryContract $productProvider;
    public function __construct(
        OrderRepositoryContract $orderProvider,
        OrderRequestsRepositoryContract $orderRequestsProvider,
        HistoryOrderRepositoryContract $historyOrderProvider,
        HistoryOrderRequestsRepositoryContract $historyOrderRequestsProvider,
        ProductRepositoryContract $productProvider,
    ) {
        $this->orderProvider = $orderProvider;
        $this->orderRequestsProvider = $orderRequestsProvider;
        $this->historyOrderProvider = $historyOrderProvider;
        $this->historyOrderRequestsProvider = $historyOrderRequestsProvider;
        $this->productProvider = $productProvider;
    }
    // /**
    //  * Display a listing of the resource.
    //  */
    public function index()
    {
        $records = $this->historyOrderProvider->index();
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreOrderRequest $request)
    {
        /*************** nested validation *******************/
        //nested validation for products 
        $products = $request->products;
        foreach ($products as $product) {
            $validation = Validator::make(
                $request->products[0],
                [
                    'product_id' => 'required|numeric|exists:products,id',
                    'quantity' => 'required|numeric|min:1'
                ]
            );
            if ($validation->fails()) {
                return response()->json([
                    'operation' => false,
                    'msg' => 'one or more fileds is invalid !',
                    'errors' => $validation->errors()->all(),
                ], 200);
            }
        }
        /******************************************************/

        /********************* Create order **************************/
        //prepeare data for order_table
        $orderData = [
            'user_id' => $request->user_id,
            'time' => Carbon::now()->toDateTimeString(),
            'status' => OrderStatus::InProgress->value,
        ];
        //store order data on orders_table
        $orderRecord = $this->orderProvider->store($orderData);
        //store order_requests on order_requests releated to this order
        foreach ($products as $product) {
            $product['order_id'] = $orderRecord->id;
            $this->orderRequestsProvider->store($product);
        }
        /************************************************************/

        /***************** Create history order *******************/
        //store history_order on history_orders table
        $historyOrderData = [
            'user_id' => $orderRecord->user_id,
            'status' => $orderRecord->status,
            'time' => $orderRecord->time,
            'total' => 0,
        ];
        $historyOrderRecord = $this->historyOrderProvider->store($historyOrderData);
        //prepearing date  for products inside order  
        $productsFullData = [];
        $overAllPrice = 0;
        foreach ($products as $key => $product) {
            $productRecord = $this->productProvider->show($product['product_id']);
            $total = ($productRecord->price - $productRecord->discount) * $product['quantity'];
            $overAllPrice += $total;
            $productData = [
                'order_id' => $historyOrderRecord->id,
                'product_id' => $productRecord->id,
                'product_name' => $productRecord->name,
                'restaurant_id' => $productRecord->restaurant_id,
                'restaurant_name' => $productRecord->restaurant_name,
                'quantity' => $product['quantity'],
                'price' => $productRecord->price,
                'discount' => $productRecord->discount,
                'image' => $productRecord->image,
                'total' => $total
            ];
            array_push($productsFullData, $productData);
        }

        //store history_order_requests on history_order_requests table releated to this history_order 
        foreach ($productsFullData as $key => $product) {
            $this->historyOrderRequestsProvider->store($product);
        }

        //update total price in history order
        $this->historyOrderProvider->update(['total' => $overAllPrice], $historyOrderRecord->id);
        /************************************************************/

        /********************* Prepearing Response data ************************/
        $record = $this->historyOrderProvider->show($historyOrderRecord->id);
        $response = [
            'id' => $record->id,
            'user_id' => $record->user_id,
            'status' => $record->status,
            'time' => $record->time,
            'total' => $record->total,
            'products' => $productsFullData,
        ];
        /************************************************************/

        return response()->json($response);
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(IdRequest $request)
    {
        $record = $this->historyOrderProvider->show($request->id);
        return response()->json($record);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request)
    {
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(IdRequest $request)
    {
        $found = $this->historyOrderProvider->destroy($request->id);
        if ($found) {
            return response()->json(['operation' => true]);
        }
        return response()->json(['operation' => false, 'msg' => "user not found"]);
    }

    //filters 
    public function filterByUser(IdRequest $request)
    {
        $response =[]; 
        $historyOrderRecords = $this->historyOrderProvider->filterByUserId($request->id);
        foreach ($historyOrderRecords as $key => $historyOrder) {
            //history order_requests for this order 
            $historyOrderRequestsRecord = $this->historyOrderRequestsProvider->filterByOrderId($historyOrder->id);
            $record = [
                'id'=>$historyOrder->id,
                'user_id'=>$historyOrder->user_id,
                'status'=>$historyOrder->status,
                'time'=>$historyOrder->time,
                'total'=>$historyOrder->total, 
                'products' => $historyOrderRequestsRecord,
            ];
            array_push($response , $record); 
        }
        return response()->json($response);
    }
}
