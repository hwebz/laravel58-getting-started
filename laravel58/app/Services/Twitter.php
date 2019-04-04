<?php

namespace App\Services;

class Twitter {
    protected $apiKey;

    public function __construct($key) {
        $this->apiKey = $key;
    }
}
