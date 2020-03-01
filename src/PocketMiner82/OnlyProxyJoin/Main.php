<?php

namespace PocketMiner82\OnlyProxyJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\event\player\PlayerPreLoginEvent;

class Main extends PluginBase implements Listener {
	public function onLoad() {
		$this->getLogger()->info(Color::YELLOW . "Plugin is loading...");
		$this->saveDefaultConfig();
	}
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(Color::GREEN . "Plugin was enabled!");
	}
	
	public function onPreLogin(PlayerPreLoginEvent $ev) {
		if ($ev->getPlayer()->getAddress() != $this->getConfig()->get("proxyAdress")) {
			$ev->setKickMessage($this->getConfig()->get("kickMessage"));
			$ev->setCancelled();
		}
	}
	
	public function onDisable() {
		$this->getLogger()->info(Color::RED . "Plugin was disabled!");
	}
}
