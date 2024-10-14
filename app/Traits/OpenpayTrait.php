<?php
namespace App\Traits;

use Exception;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiTransactionError;
use Illuminate\Http\JsonResponse;

trait OpenpayTrait
{

    /**
     * Get Openpay instance
     * @return JsonResponse|Openpay
     */
    protected function getInstance(): Openpay|JsonResponse
    {
        try {
            $openpay = Openpay::getInstance(env('OPENPAY_ID'), env('OPENPAY_PRIVATE'), 'MX');
            $openpay->setProductionMode(env('OPENPAY_PRODUCTION_MODE'));
            return $openpay;
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Add new customer to merchant
     * @param array $data
     * @return JsonResponse
     */
    public function addCustomer(array $data): JsonResponse
    {
        try {
            $customerData = array(
                'name' => $data['name'],
                'last_name' => $data['last-name'],
                'email' => $data['email'],
                'phone_number' => $data['phone'],
                'address' => array(
                    'line1' => $data['address'],
                    'line2' => '',
                    'line3' => '',
                    'postal_code' => $data['postal-code'],
                    'state' => $data['state'],
                    'city' => $data['city'],
                    'country_code' => 'MX'));

            return response()->json([
                'data' => $this->getInstance()->customers->add($customerData)
            ]);

        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Get a customer
     * @param string $customerID
     * @return JsonResponse
     */
    public function getCustomer(string $customerID): JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->getInstance()->customers->get($customerID)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Update a customer
     * @param string $customerID
     * @param array $data
     * @return JsonResponse
     */
    public function updateCustomer(string $customerID, array $data): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;

            $customer->name = $data['name'];
            $customer->last_name = $data['last-name'];
            $customer->save();

            return response()->json([
                'data' => $this->getInstance()->customers->get($customer)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Delete a customer
     * @param string $customerID
     * @return JsonResponse
     */
    public function deleteCustomer(string $customerID): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;
            return response()->json([
                'data' => $customer->delete()
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Add card on a customer
     * @param string $customerID
     * @param array $data
     * @return JsonResponse
     */
    public function addCart(string $customerID, array $data): JsonResponse
    {
        try {
            $cardData = array(
                'holder_name' => 'Teofilo Velazco',
                'card_number' => '4916394462033681',
                'cvv2' => '123',
                'expiration_month' => '12',
                'expiration_year' => '15',
                'address' => array(
                    'line1' => 'Privada Rio No. 12',
                    'line2' => 'Co. El Tintero',
                    'line3' => '',
                    'postal_code' => '76920',
                    'state' => 'Querétaro',
                    'city' => 'Querétaro.',
                    'country_code' => 'MX'));

            $customer = $this->getCustomer($customerID)->data;

            return response()->json([
                'data' => $customer->cards->add($cardData)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Get a customer card
     * @param string $customerID
     * @param string $cardID
     * @return JsonResponse
     */
    public function getCard(string $customerID, string $cardID): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;
            return response()->json([
                'data' => $customer->cards->get($cardID)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Get customer registered cards
     * @param string $customerID
     * @param string $from
     * @param string $to
     * @return JsonResponse
     */
    public function getCards(string $customerID, string $from, string $to): JsonResponse
    {
        try {
            $findData = array(
                'creation[gte]' => $from,
                'creation[lte]' => $to,
                'offset' => 0,
                'limit' => 10);
            $customer = $this->getCustomer($customerID)->data;
            return response()->json([
                'data' => $customer->cards->getList($findData)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Delete customer card
     * @param string $customerID
     * @param string $cardID
     * @return JsonResponse
     */
    public function deleteCard(string $customerID, string $cardID): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;
            $card = $customer->cards->get($cardID);
            return response()->json([
                'data' => $card->delete()
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }


    /**
     * Make a charge on a customer
     * @param array $customer
     * @param array $data
     * @param float $total
     * @param string $hash
     * @return JsonResponse
     */
    public function charge(array $customer, array $data, float $total, string $hash): JsonResponse
    {
        try {
            $chargeRequest = array(
                'source_id' => $data['token_id'],
                'method' => 'card',
                'amount' => $total,
                'currency' => 'MXN',
                'description' => 'Cargo a tarjeta desde '. env('APP_NAME'),
                'device_session_id' => $data['deviceIdHiddenFieldName'],
                'customer' => $customer,
                'order_id' => $hash
            );
            return response()->json([
                'data' => $this->getInstance()->charges->create($chargeRequest)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Get customer charge
     * @param string $customerID
     * @param string $chargeID
     * @return JsonResponse
     */
    public function getCharge(string $customerID, string $chargeID): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;
            return response()->json([
                'data' => $customer->charges->get($chargeID)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Get costumer charges list
     * @param string $customerID
     * @param string $from
     * @param string $to
     * @return JsonResponse
     */
    public function getCharges(string $customerID, string $from, string $to): JsonResponse
    {
        try {
            $customer = $this->getCustomer($customerID)->data;
            $findData = array(
                'creation[gte]' => $from,
                'creation[lte]' => $to,
                'offset' => 0,
                'limit' => 5);
            return response()->json([
                'data' => $customer->charges->getList($findData)
            ]);
        } catch (OpenpayApiTransactionError|OpenpayApiRequestError|OpenpayApiConnectionError|OpenpayApiAuthError|OpenpayApiError|Exception $e) {
            return $this->errorOpenpay($e);
        }
    }

    /**
     * Protected function error
     * @param $e
     * @return JsonResponse
     */
    protected function errorOpenpay($e): JsonResponse
    {
        return response()->json([
            'error' => [
                'category' => $e->getCategory(),
                'error_code' => $e->getErrorCode(),
                'description' => $e->getMessage(),
                'http_code' => $e->getHttpCode(),
                'request_id' => $e->getRequestId()
            ]
        ]);
    }
}
