<?php

namespace Fused\BladeFuture;

class FutureParser
{
    public static function parse(string $value): string
    {
        if (preg_match('/<([a-z]+)(?![^>]*\/>)[^>]*>/', $value, $matches)) {
            return preg_replace('/\<'.$matches[1].'/', '<'.$matches[1].' x-future', $value, 1);
        }

        return $value;
    }
}
