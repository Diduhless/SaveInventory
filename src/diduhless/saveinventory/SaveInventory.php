<?php

declare(strict_types=1);


namespace diduhless\saveinventory;


use diduhless\saveinventory\utils\InventoryUtils;
use pocketmine\plugin\PluginBase;

class SaveInventory extends PluginBase {
    use InventoryUtils;

    /** @var self */
    static private $instance;

    public function onLoad() {
        self::$instance = $this;
    }

    public static function getInstance(): SaveInventory {
        return self::$instance;
    }

}