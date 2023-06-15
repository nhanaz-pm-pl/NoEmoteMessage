<?php

declare(strict_types=1);

namespace NhanAZ\NoEmoteMessage;

use pocketmine\event\EventPriority;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\StartGamePacket;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvent(DataPacketSendEvent::class, function (DataPacketSendEvent $event): void {
			$packets = $event->getPackets();
			foreach ($packets as $packet) {
				if ($packet instanceof StartGamePacket) {
					$packet->levelSettings->muteEmoteAnnouncements = true;
				}
			}
		}, EventPriority::HIGHEST, $this);
	}
}
