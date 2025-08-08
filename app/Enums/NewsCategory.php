<?php

namespace App\Enums;

enum NewsCategory: string
{
    case PRESTASI = 'prestasi';
    case KEGIATAN = 'kegiatan';
    case FASILITAS = 'fasilitas';
    case LAINNYA = 'lainnya';
}
