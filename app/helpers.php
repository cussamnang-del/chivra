<?php

/*
|--------------------------------------------------------------------------
| Global Number-Formatting Helpers
|--------------------------------------------------------------------------
|
| Many Blade views in this project define these as inline `@php` functions.
| When PHP code (e.g. App\PartnerTransfer) needs the same formatting, the
| inline definitions are not available, so the calls throw "undefined
| function". Defining them globally here makes them callable from anywhere.
|
| `function_exists` guards keep the inline Blade definitions safe — the
| inline versions still win where they are declared.
|
*/

if (! function_exists('phpformatnumber')) {
    function phpformatnumber($num)
    {
        $dc = 0;
        $p = strpos((string) (float) $num, '.');
        if ($p > 0) {
            $fp = substr((string) $num, $p, strlen((string) $num) - $p);
            $dc = strlen((string) (float) $fp) - 2;
        }

        return number_format((float) $num, max(0, $dc), '.', ',');
    }
}

if (! function_exists('phpformatnumber2d')) {
    function phpformatnumber2d($num)
    {
        $dc = 0;
        $p = strpos((string) (float) $num, '.');
        if ($p > 0) {
            $dc = 2;
        }

        return number_format((float) $num, $dc, '.', ',');
    }
}
