<?php

namespace App\Models\User;

trait UserAttributes
{
    public function setEmailAttribute($value)
    {
        if (! empty($this->attributes['email']) && $this->attributes['email'] !== $value) {
            $this->attributes['email_verified_at'] = null;
            $this->sendEmailVerificationNotification();
        }
        $this->attributes['email'] = $value;
    }
}
