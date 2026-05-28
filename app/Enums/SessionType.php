<?php

namespace App\Enums;

enum SessionType: string
{
    case Voice = 'voice';
    case Video = 'video';
    case InPerson = 'in_person';

    public function label(): string
    {
        return match ($this) {
            self::Voice => 'Voice Call',
            self::Video => 'Video Call',
            self::InPerson => 'In Person',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Voice => 'phone',
            self::Video => 'camera',
            self::InPerson => 'people',
        };
    }
}
