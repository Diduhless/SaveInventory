<?php

declare(strict_types=1);


namespace diduhless\saveinventory\provider;


use diduhless\saveinventory\SaveInventory;
use pocketmine\Player;
use pocketmine\utils\Config;

class JsonProvider {

    public function getPlayerConfig(Player $player): Config {
        return new Config(SaveInventory::getInstance()->getDataFolder() . "users/" . strtolower($player->getName()) . ".json");
    }

}