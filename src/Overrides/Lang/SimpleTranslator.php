<?php
namespace Juwai\LaravelBase\Overrides\Lang;

use Illuminate\Translation\Translator;
use Illuminate\Support\Str;

class SimpleTranslator extends Translator
{
    public function get($key, array $replace = array(), $locale = null)
    {
        if (Str::contains($key, '.')) {
            return parent::get($key, $replace, $locale);
        }

        $defaultPrefix = config('translation.default_prefix');

        return parent::get("$defaultPrefix.$key", $replace, $locale);
    }
}
