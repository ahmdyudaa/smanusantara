<?php

namespace App\Enums;

enum GalleryCategory: string
{
    case SAINS = 'sains';
    case OLAHRAGA = 'olahraga';
    case BUDAYA = 'budaya';
    case PERPUSTAKAAN = 'perpustakaan';
    case MUSIK = 'musik';
    case TEKNOLOGI = 'teknologi';
    case LINGKUNGAN = 'lingkungan';
    case DEBAT = 'debat';
    case LAINNYA = 'lainnya';
}
