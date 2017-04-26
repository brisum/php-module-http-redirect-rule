<?php

namespace Brisum\HttpRedirectRule;

use Brisum\HttpRedirectRule\Model\RedirectRule;

class Redirect
{
    /**
     * @param string $url
     * @return void
     */
    public function exec($url)
    {
        $url = urldecode($url);

        /** @var RedirectRule $redirectRule */
        $rule = RedirectRule::where(['url_from' => $url, 'is_regexp' => false])->first();
        $redirectTo = null;
        $redirectCode = null;

        if ($rule) {
            $redirectTo = $rule->url_to;
            $redirectCode = $rule->code;
        } else {
            $regexpRules = RedirectRule::where(['is_regexp' => true])->get();
            foreach ($regexpRules as $rule) {
                if (!preg_match("/{$rule->url_from}/", $url, $match)) {
                    continue;
                }

                $redirectTo = $rule->url_to;
                $redirectCode = $rule->code;
                foreach ($match as $matchKey => $matchPlace) {
                    $redirectTo = str_replace('$' . $matchKey, $matchPlace, $redirectTo);
                }
            }
        }

        if ($redirectTo) {
            header("Location: {$redirectTo}", true, $redirectCode);
            die();
        }
    }
}
