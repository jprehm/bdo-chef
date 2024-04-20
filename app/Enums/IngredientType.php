<?php

namespace App\Enums;

enum IngredientType: string
{
    case FACEBOOK = 'processing';
    case TWITTER = 'cooking';
    case YOUTUBE = 'worker';
    case GATHERING = 'gathering';
    case FARMING = 'farming';
    case VENDOR = 'vendor';
}
