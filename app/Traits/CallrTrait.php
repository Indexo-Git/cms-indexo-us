<?php
namespace App\Traits;

use CALLR\API\Authentication\LoginPasswordAuth;
use CALLR\API\Client;

trait CallrTrait{

    /**
     * API init
     * @return Client
     */
    protected function getInstance(): Client
    {
        $api = new Client();
        $api->setAuth(new LoginPasswordAuth(env('CALLR_USER'), env('CALLR_PASSWORD')));
        return $api;
    }

    /*
     * --------------------------- LIST METHODS
     */

    /**
     * List available countries with DID availability
     * @return mixed
     */
    public function getCountries(): mixed
    {
        return $this->getInstance()->call('did/areacode.countries');
    }

    /**
     * Get area codes available for a specific country and DID type
     * @param $country
     * @return mixed
     */
    public function getAreaCode($country): mixed
    {
        return $this->getInstance()->call('did/areacode.get_list',[$country, null]);
    }

    /**
     * List of countries
     * @return mixed
     */
    public function listCountries(): mixed
    {
        return $this->getInstance()->call('list.countries');
    }

    /**
     * List of timezones
     * @return mixed
     */
    public function listTimezones(): mixed
    {
        return $this->getInstance()->call('list.timezones');
    }

    /**
     * Return email templates (used in Voicemails, recording alerts, etc.)
     * @return mixed
     */
    public function emailGetTemplates(): mixed
    {
        return $this->getInstance()->call('media/email.get_templates', ['VMS']);
    }

    /*
    * --------------------------- APP METHODS
    */

    /**
     * Create a new Voice App, and optionally configure it at the same time.
     * @param string $name
     * @param array $options
     * @return mixed
     */
    public function createApp(string $name, array $options): mixed
    {
        return $this->getInstance()->call('apps.create', ['CALLTRACKING10', $name, $options]);
    }

    /**
     * @param string $hash
     * @param array $params
     * @return mixed
     */
    public function editApp(string $hash, array $params): mixed
    {
        return $this->getInstance()->call('apps.edit', [$hash, null, $params]);
    }

    /**
     * Delete Voice App. If DID is assigned to the Voice App, it is freed first.
     * @param string $hash
     * @return mixed
     */
    public function deleteApp(string $hash): mixed
    {
        return $this->getInstance()->call('apps.delete', [$hash]);
    }

    /**
     * Search apps
     * @param array $filters
     * @param array $options
     * @return mixed
     */
    public function searchApps(array $filters, array $options): mixed
    {
        return $this->getInstance()->call('apps.search', [$filters, $options]);
    }

    /*
     * --------------------------- DID METHODS
     */

    /**
     * Reserve a DID
     * @param string $prefix
     * @return mixed
     */
    public function reserveDID(string $prefix): mixed
    {
        return $this->getInstance()->call('did/store.reserve',[ $prefix , 'CLASSIC', 1, 'RANDOM']);
    }

    /**
     * Buy an order (after calling "reserve")
     * @param string $token
     * @return mixed
     */
    public function buyDID(string $token): mixed
    {
        return $this->getInstance()->call('did/store.reserve',[ $token , 'CLASSIC', 1, 'RANDOM']);
    }

    /**
     * Assign a DID to a Voice App. Only Call Tracking and Real-Time Apps can be assigned DIDs.
     * @param string $app
     * @param string $did
     * @return mixed
     */
    public function assignDID(string $app, string $did): mixed
    {
        return $this->getInstance()->call('apps.assign_did', [$app, $did]);
    }

    /**
     * View your store quota status
     * @return mixed
     */
    public function getQuotaStatus(): mixed
    {
        return $this->getInstance()->call('did/store.get_quota_status');
    }

    /**
     * Search DIDs
     * @param array $filters
     * @param array $options
     * @return mixed
     */
    public function searchDIDs(array $filters, array $options): mixed
    {
        return $this->getInstance()->call('did.search', [$filters, $options]);
    }

    /*
     * --------------------------- WEBHOOK METHODS
     */

    /**
     * Subscribes a new Webhook
     * @param string $type
     * @param string $endpoint
     * @param array $options
     * @return mixed
     */
    public function subscribeWebhook(string $type, string $endpoint, array $options): mixed
    {
        return $this->getInstance()->call('webhooks.subscribe', [ $type, $endpoint, $options ]);
    }

    /*
     * --------------------------- SMS METHODS
     */

    /**
     * Send a text message.
     * @param string $to
     * @param string $body
     * @param array $options
     * @return mixed
     */
    public function sendSMS(string $to, string $body, array $options): mixed
    {
        // First param should always be SMS unless Callr gives you another option
        return $this->getInstance()->call('sms.send', ['SMS' , $to, $body, $options]);
    }
}
