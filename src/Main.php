<?php

declare(strict_types=1);

namespace NeiroNetwork\ChatStyleRestrictor;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onPlayerChatEvent(PlayerChatEvent $event){
		$player = $event->getPlayer();
		if(!$this->getServer()->isOp($player->getName())){
			$event->setMessage(TextFormat::clean($event->getMessage()));
		}
	}
}
