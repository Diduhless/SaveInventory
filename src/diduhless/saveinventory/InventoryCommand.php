<?php

declare(strict_types=1);


namespace diduhless\saveinventory;


use diduhless\saveinventory\utils\InventoryUtils;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class InventoryCommand extends Command implements PluginIdentifiableCommand {
    use InventoryUtils;

    public function __construct() {
        parent::__construct("inventory", "Opens the inventory form menu", null, ["saveinventory"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if($sender instanceof Player) {
            $this->openInventoriesForm($sender);
        }
    }

    public function getPlugin(): Plugin {
        return SaveInventory::getInstance();
    }
    
}