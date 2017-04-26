<?php

namespace Brisum\HttpRedirectRule\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;

!defined('BSM_HTTP_REDIRECT_RULE_CONNECTION') && define('BSM_HTTP_REDIRECT_RULE_CONNECTION', 'default');
!defined('BSM_HTTP_REDIRECT_RULE_TABLE') && define('BSM_HTTP_REDIRECT_RULE_TABLE', 'bsm_http_redirect_rule');

class RedirectRule extends EloquentModel
{
    protected $connection = BSM_HTTP_REDIRECT_RULE_CONNECTION;
    protected $table = BSM_HTTP_REDIRECT_RULE_TABLE;
    protected $primaryKey = 'url_from';
    public $timestamps = true;

    protected $fillable = [
        'url_from',
        'url_to',
        'code',
        'is_regexp',
    ];

    protected $casts = [
        'url_from' => 'string',
        'url_to' => 'string',
        'code' => 'integer',
        'is_regexp' => 'boolean',
    ];
}
