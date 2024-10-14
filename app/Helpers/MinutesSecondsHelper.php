<?php

    /**
     * @param int $seconds
     * @return string
     */
    function formatMinutesSeconds(int $seconds): string
    {
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;
        return str_pad($minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($remainingSeconds, 2, '0', STR_PAD_LEFT);
    }
