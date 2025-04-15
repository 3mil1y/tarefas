<?php

namespace App\Core;

class Flash {
    public static function set(string $message, string $type = 'info'): void {
        Session::set('flash_message', [
            'message' => $message,
            'type' => $type
        ]);
    }

    public static function get(): ?array {
        $flash = Session::get('flash_message');
        Session::remove('flash_message');
        return $flash;
    }

    public static function has(): bool {
        return Session::has('flash_message');
    }
}