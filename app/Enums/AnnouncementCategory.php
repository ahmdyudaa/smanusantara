<?php

namespace App\Enums;

enum AnnouncementCategory: string
{
    case AKADEMIK = 'akademik';
    case EKSTRAKURIKULER = 'ekstrakurikuler';
    case FASILITAS = 'fasilitas';
    case LAINNYA = 'lainnya';
}
