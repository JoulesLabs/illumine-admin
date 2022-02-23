<?php

declare(strict_types=1);

namespace App\Utilities;

use Illuminate\Validation\ValidationException;

class ToasterAlert
{
    public static ?self $instance = null;
    protected string $key;
    protected string $message;

    public function success($message): self
    {
        $this->setKeyMessage('success', $message);

        return $this;
    }

    public function warning($message): self
    {
        $this->setKeyMessage('warning', $message);

        return $this;
    }

    public function error($message): self
    {
        $this->setKeyMessage('error', $message);

        return $this;
    }

    public function info($message): self
    {
        $this->setKeyMessage('info', $message);

        return $this;
    }

    public function flash(): void
    {
        session()->flash( config('illumineadmin.toaster_alert.key') . '_'. $this->key, $this->message);
    }

    public function get(): array
    {
        $prefix = config('illumineadmin.toaster_alert.key');
        $list = [];
        foreach(config('illumineadmin.toaster_alert.levels') as $level) {
            if (session()->has($prefix .'_'. $level)) {
                $list[$level] = session()->get($prefix .'_'. $level);
            }
        }

        return $list;
    }

    private function setKeyMessage(string $key, string $message): void
    {
        $this->key = $key;
        $this->message = $message;
    }
}
