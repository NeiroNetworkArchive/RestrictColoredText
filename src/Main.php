<?php

declare(strict_types=1);

namespace NeiroNetwork\ChatStyleRestrictor;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\permission\DefaultPermissions;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onPlayerChatEvent(PlayerChatEvent $event){
		$player = $event->getPlayer();
		if(!$player->hasPermission(DefaultPermissions::ROOT_OPERATOR)){
			$event->setMessage(TextFormat::clean($event->getMessage()));
		}
	}
}
