<?php

namespace App;

use App\Configuration\ViewContent;

final class Configuration
{
    public function viewContent(): ViewContent
    {
        return new ViewContent();
    }
}
