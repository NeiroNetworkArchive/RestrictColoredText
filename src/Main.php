<?php

declare(strict_types=1);

namespace NeiroNetwork\RestrictColoredText;

use pocketmine\block\utils\SignText;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\permission\DefaultPermissions;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @priority HIGHEST
	 */
	public function onPlayerChat(PlayerChatEvent $event) : void{
		$player = $event->getPlayer();
		if(!$player->hasPermission(DefaultPermissions::ROOT_OPERATOR)){
			$event->setMessage(TextFormat::clean($event->getMessage()));
		}
	}

	/**
	 * @priority HIGHEST
	 */
	public function onSignChange(SignChangeEvent $event) : void{
		$player = $event->getPlayer();
		if(!$player->hasPermission(DefaultPermissions::ROOT_OPERATOR)){
			$newLines = array_map(fn($line) => TextFormat::clean($line), $event->getNewText()->getLines());
			$event->setNewText(new SignText($newLines));
		}
	}
}
