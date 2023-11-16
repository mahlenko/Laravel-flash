<?php

namespace Makhlenko\LaravelFlash;

enum FlashType
{
    case SUCCESS;
    case ERROR;
    case WARNING;
    case INFO;
    case MESSAGE;
}
