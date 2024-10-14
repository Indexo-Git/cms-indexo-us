<?php
namespace App\Traits;

use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

trait MercadoPagoTrait
{
    /**
     * @var mixed
     */
    public mixed $mercadoPago;

    /**
     * Initialize SDK with token
     */
    protected function setToken()
    {
        try {
            SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        }catch (Exception $e) {
            return $this->errorMercadoPago($e, 'setToken');
        }
    }

    /**
     * @param Order $order
     * @return JsonResponse|Preference
     */
    public function setPreference(Order $order): Preference|JsonResponse
    {
        $this->setToken();
        try {
            $preference = new Preference();
            $items = [];
            foreach ($order->details as $detail) {
                $items[] = $this->setItem($detail->product->name, $detail->quantity, $detail->product->sale_price ? : $detail->product->regular_price);
            }
            $items[] = $this->setItem("Envío", 1, $order->shipping->state->zones[0]->price);
            $preference->items = $items;
            $preference->back_urls = array(
                "success" => route('mercadopago-success'),
                "failure" => route('mercadopago-failure'),
                "pending" => route('mercadopago-pending')
            );
            $preference->auto_return = "approved";
            $preference->save();
            return $preference;
        }catch (Exception $e) {
            return $this->errorMercadoPago($e, 'setPreference');
        }
    }

    protected function setItem(string $name, int $quantity, float $price){
        $item = new Item();
        $item->title = $name;
        $item->quantity = $quantity;
        $item->unit_price = $price;
        return $item;
    }

    /**
     * Protected function error
     * @param $e
     * @param $method
     * @return JsonResponse
     */
    protected function errorMercadoPago($e, $method): JsonResponse
    {
        return response()->json([
            'error' => [
                'content' => $e,
                'method' => $method
            ]
        ]);
    }
}
