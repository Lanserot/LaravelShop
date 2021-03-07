<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

/**
 * Контроллер для работы с корзиной
 * @param order object
 */
class BasketController extends Controller
{
    protected $order = NULL;

    /**
     * Функция для получения объекта ордера
     * @return object
     */
    protected function getOrderObj($page = 'index')
    {
        if ($this->order !== NULL) {
            return $this->order;
        }

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route($page);
        }

        $this->order = Order::find($orderId);
        return $this->order;
    }

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }

        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $order = $this->getOrderObj();

        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            $this->checkCountItem($order);
            session()->flash('success', 'Заказ принят в обработку');
        } else {
            session()->flash('warning', 'Ошибка :(');
        }

        return redirect()->route('index');
    }

    /**
     * Функция для изменения кол-ва товаров, после оформления
     */
    protected function checkCountItem($order): void
    {
        $products = $order->getAllProductsId();
        foreach ($products as $item) {
            $countProduct = $order->products()->where('product_id', $item)->first()->pivot;
            $product = Product::find($item);
            $product->count -= $countProduct->count;
            $product->update();
        }
    }

    public function basketPlace()
    {
        $order = $this->getOrderObj();
        return view('order', compact('order'));
    }

    /**
     * Функция для добавления элемента в корзину
     */
    public function basketAdd($productId)
    {

        $orderId = session('orderId');      //Создаю сессию
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {       //Добавляю данные в сессию
            $product = Product::find($productId);
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < $product->count) {
                $pivotRow->count++;
                $pivotRow->update();
            }
        } else {
            $order->products()->attach($productId);
        }

        return redirect()->route('basket');

    }

    /**
     * Функция для удаления элемента из корзины
     */
    public function basketDel($productId)
    {

        $order = $this->getOrderObj('basket');

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('basket');

    }
}
