<?php

namespace App\Components\Layout;

use App\Core\Flash;

class FlashMessage {
    public static function render(): string {
        if (!Flash::has()) {
            return '';
        }

        $flash = Flash::get();
        $type = $flash['type'];
        $message = $flash['message'];

        return "<div class='flash-message flash-{$type}'>
            {$message}
        </div>";
    }
}