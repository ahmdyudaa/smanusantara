<?php

namespace App\Enums;

enum AnnouncementPriority: string
{
    case URGENT = 'urgent';
    case PENTING = 'penting';
    case INFO = 'info';
}
