<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\{OrderItemStoreRequest, OrderItemUpdateRequest};
use App\Models\{OrderItem, Product, Category};
use Illuminate\Http\{Response, RedirectResponse};
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $orderItems = OrderItem::with(['product', 'category'])->paginate(10); // Include category in relationships

        return response()
            ->view('dashboard.order-item.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        // Fetch all products and categories for dropdowns
        $products = Product::select('id', 'name', 'category_id')->get();
        $categories = Category::select('id', 'name')->get();

        return response()->view('dashboard.order-item.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderItemStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($request->input('product_id'));

            // Check if the quantity exceeds the stock
            if ($request->input('quantity') > $product->quantity_in_stock) {
                return redirect()
                    ->back()
                    ->withErrors(['quantity' => 'The quantity is greater than the quantity in stock.']);
            }
            

            // Create a new OrderItem
            $orderItem = new OrderItem();
            $orderItem->quantity = $request->input('quantity');
            $orderItem->unit_price = $product->price;
            $orderItem->product_id = $request->input('product_id');
            $orderItem->category_id = $request->input('category_id'); // Assign category
            $orderItem->save();

            // Update product stock
            $product->quantity_in_stock = $product->quantity_in_stock - $orderItem->quantity;
            $product->save();

            DB::commit();

            return redirect()
                ->route('dashboard.order-items.index')
                ->with('success', 'OrderItem successfully created.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to create OrderItem.');
        }
    }
     /**
     * Get products by category.
     */
    public function getProductsByCategory($categoryId)
    {
        // Fetch products that belong to the selected category
        $products = Product::where('category_id', $categoryId)->get();

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem): Response
    {
        $orderItem->load(['product', 'category']); // Load category relationship

        return response()
            ->view('dashboard.order-item.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem): Response
    {
        $products = Product::select('id', 'name', 'quantity_in_stock', 'price')->get();
        $categories = Category::select('id', 'name')->get();

        return response()
            ->view('dashboard.order-item.edit', compact('orderItem', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderItemUpdateRequest $request, OrderItem $orderItem): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $product = Product::find($orderItem->product_id);

            $quantity = $request->input('quantity') - $orderItem->quantity;
            if ($request->input('quantity') > ($product->quantity_in_stock + $orderItem->quantity)) {
                return redirect()
                    ->back()
                    ->withErrors(['quantity' => 'The quantity is greater than the quantity in stock.']);
            }

            // Update the product stock
            $product->quantity_in_stock -= $quantity;
            $product->save();

            // Update the order item
            $orderItem->quantity = $request->input('quantity');
            $orderItem->unit_price = $product->price; // Update unit price if necessary
            $orderItem->category_id = $request->input('category_id'); // Update category
            $orderItem->save();

            DB::commit();

            return redirect()
                ->route('dashboard.order-items.index')
                ->with('success', 'OrderItem Successfully updated.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('dashboard.order-items.index')
                ->with('error', 'Failed to update OrderItem.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($orderItem->product_id);
            $product->quantity_in_stock = $orderItem->quantity + $product->quantity_in_stock;
            $product->save();

            // Delete the order item
            $orderItem->delete();

            DB::commit();

            return redirect()
                ->route('dashboard.order-items.index')
                ->with('success', 'OrderItem successfully deleted.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to delete OrderItem.');
        }
    }
}

