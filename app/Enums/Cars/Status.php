<?php

    namespace App\Enums\Cars;

    enum Status : int {
        case DRAFT = 0;
        case ACTIVE = 5;
        case SOLD = 10;
        case CANCELED = 15;

        public function toString() {
            return match($this) {
                self::DRAFT => 'Draft',
                self::ACTIVE => 'Active',
                self::SOLD => 'Sold',
                self::CANCELED => 'Canceled',
            };
        }
    }