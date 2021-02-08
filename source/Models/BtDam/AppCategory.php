<?php

namespace Source\Models\BtDam;

use Source\Core\Model;

/**
 * Class AppCategory
 * @package Source\Models\BtDam
 */
class AppCategory extends Model
{
    /**
     * AppCategory constructor.
     */
    public function __construct()
    {
        parent::__construct("app_categories", ["id"], ["name", "type"]);
    }
}