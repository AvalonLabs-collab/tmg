<?php

namespace App;

enum VehicleCondition: string
{
    case NEW = 'new';
    case USED = 'used';
    case FOREIGN_USED = 'foreign_used';
}
