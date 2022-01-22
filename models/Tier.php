<?php namespace HendrikErz\PatreonList\Models;

use Winter\Storm\Database\Model;

/**
 * Model
 */
class Tier extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'pledge_amount',
        'currency'
    ];

    protected $implements = [
        'Winter\Storm\Database\Traits\Sortable',
    ];

    public $hasMany = [
        'patrons' => ['HendrikErz\PatreonList\Models\Patron'],
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'hendrikerz_patreonlist_tiers';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
