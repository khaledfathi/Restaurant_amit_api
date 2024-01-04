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
    private OrderRequestsRepositoryContract $orderRequestsProvider ;
    private HistoryOrderRepositoryContract $historyOrderProvider; 
    private HistoryOrderRequestsRepositoryContract $historyOrderRequestsProvider; 
    private ProductRepositoryContract $productProvider ; 
    public function __construct(
        OrderRepositoryContract $orderProvider,
        OrderRequestsRepositoryContract $orderRequestsProvider ,
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
        $records = $this->orderProvider->index();
        return response()->json($records);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreOrderRequest $request)
    {
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

        //prepeare data for order
        $data = [
            'user_id' => $request->user_id,
            'products' => $request->products,
            'time' => Carbon::now()->toDateTimeString(),
            'status' => OrderStatus::InProgress->value,
        ];
       
        //store order data on orders_table
        $orderRecord = $this->orderProvider->store($data);
       
        //store order_requests on order_requests releated to this order
        foreach ($products as $product) {
            $product['order_id'] = $orderRecord->id; 
            $this->orderRequestsProvider->store($product); 
        }
        
        //store history_order on history_orders table
        $historyOrderData = [
            'user_id'=>$orderRecord->user_id,
            'status'=>$orderRecord->status,
            'order_id'=>$orderRecord->id, 
            'time'=>$orderRecord->time
        ];
        $historyOrderRecord = $this->historyOrderProvider->store($historyOrderData); 

        //store history_order_requests on history_order_requests table releated to this history_order 
        foreach ($products as $key => $product) {
            $productRecord = $this->productProvider->show($product['product_id']);
            $data = [
                'quantity'=>$product['quantity'],
                'order_id'=>$historyOrderRecord->id, 
                'product_id'=>$product['product_id'],
                'product_name'=>$productRecord->name, 
                'price'=> $productRecord->price, 
                'discount'=>$productRecord->discount, 
                'image'=>$productRecord->image,
            ];
            $this->historyOrderRequestsProvider->store($data); 
        }
        /**********************************************************/
        //perpearing all information will be returned for this order
        $historyOrderRequstesRecord = $this->historyOrderRequestsProvider->filterByOrderId($historyOrderRecord->id); 
        $fullDataProductsOnOrder= []; 
        $overAllPrice=0; 
        foreach ($historyOrderRequstesRecord as $key => $orderRequest) {
            $total =  (($orderRequest->price)-($orderRequest->discount))*$orderRequest->quantity; 
            $overAllPrice += $total; 
            array_push($fullDataProductsOnOrder, [
                'product_id' => $orderRequest->product_id, 
                'product_name' => $orderRequest->product_name, 
                'quantity' => $orderRequest->quantity,
                'price' => $orderRequest->price, 
                'discount' => $orderRequest->discount, 
                'image' => $orderRequest->image, 
                'total'=> $total, 
            ]); 
        }

        //response record data 
        $fullDataHistoryOrder = [
            'operation'=>true,
            'id' => $historyOrderRecord->id,
            'time' => $historyOrderRecord->time, 
            'total'=>$overAllPrice,
            'products'=> $fullDataProductsOnOrder,
        ]; 

        $record['operation'] = true;
        return response()->json($fullDataHistoryOrder);
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
    public function filterByUser(IdRequest $request){
        
    }
}
