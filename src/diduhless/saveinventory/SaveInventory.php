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
        $inventories_dir = $this->getDataFolder() . "inventories";
        if(!is_dir($inventories_dir)) {
            mkdir($inventories_dir);
        }
        self::$instance = $this;
    }

    public function onEnable() {
        $this->getServer()->getCommandMap()->register("inventory", new InventoryCommand());
    }

    public static function getInstance(): SaveInventory {
        return self::$instance;
    }

}