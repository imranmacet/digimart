<?php
namespace App\Services;


class NotificationService {
    static function CREATED($message = null) {
        notyf()->success($message ?? __('Create Successfully'));
    }

    static function UPDATED($message = null) {
        notyf()->success($message ?? __('Update Successfully'));
    }

    static function DELETED($message = null) {
        notyf()->success($message ?? __('Deleted Successfully'));
    }

    static function ERROR($message = null) {
        notyf()->error($message ?? __('Something went wrong'));
    }
}
