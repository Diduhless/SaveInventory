<?php

declare(strict_types=1);


namespace diduhless\saveinventory\utils;


use diduhless\saveinventory\form\InventoryMenuForm;
use diduhless\saveinventory\SaveInventory;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\Config;

trait InventoryUtils {

    /**
     * @param Player $player
     * @param string $inventory_name
     * @return Item[]|null
     */
    public function getInventoryContents(Player $player, string $inventory_name): ?array {
        $config = $this->getPlayerConfig($player);
        $contents = $config->get($inventory_name);
        return $contents !== false ? $contents : null;
    }

    public function getAllInventoryNames(Player $player): array {
        return $this->getPlayerConfig($player)->getAll(true);
    }

    public function saveInventory(Player $player, string $inventory_name): void {
        $config = $this->getPlayerConfig($player);
        $config->set($inventory_name, $player->getInventory()->getContents(true));
        $config->save();
    }

    public function removeInventory(Player $player, string $inventory_name): void {
        $config = $this->getPlayerConfig($player);
        $config->remove($inventory_name);
        $config->save();
    }

    public function openInventoriesForm(Player $player): void {
        $player->sendForm(new InventoryMenuForm());
    }

    private function getPlayerConfig(Player $player): Config {
        return new Config(SaveInventory::getInstance()->getDataFolder() . "inventories/" . strtolower($player->getName()) . ".sl", Config::SERIALIZED);
    }

}