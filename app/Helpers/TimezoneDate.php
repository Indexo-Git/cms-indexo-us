<?php

    use App\Models\Setting;
    use Carbon\Carbon;

    /**
     * Set defined timezone
     * @param string $date
     * @return mixed
     */
    function setTimezone(string $date): mixed
    {
        // Create a Carbon instance from the datetime string
        $originalDatetime = Carbon::createFromFormat('Y-m-d H:i:s', $date, 'UTC');
        // Set the desired timezone
        return $originalDatetime->setTimezone(Setting::where('name', 'call_tracking_timezone')->first()->value);
    }
