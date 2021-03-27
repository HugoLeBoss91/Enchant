<?php



namespace EnchantTable;



use pocketmine\block\Block;

use pocketmine\item\enchantment\Enchantment;

use pocketmine\plugin\PluginBase;



class Main extends PluginBase {



    public $swordEnchantments = [];

    public $toolEnchantments = [];

    public $bowEnchantments = [];

    public $helmetEnchantments = [];

    public $chesplateEnchantments = [];

    public $leggingEnchantments = [];

    public $bootsEnchantments = [];



    public function onEnable()

    {

        @mkdir($this->getDataFolder());

        $this->saveDefaultConfig();

        $this->initEnchantments();

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);

    }



    public function initEnchantments() {

        // registering some missing enchantments

        Enchantment::registerEnchantment(new Enchantment(Enchantment::FORTUNE, "Fortune", Enchantment::RARITY_UNCOMMON, Enchantment::SLOT_DIG, Enchantment::SLOT_NONE, 3));

        Enchantment::registerEnchantment(new Enchantment(Enchantment::LOOTING, "Looting", Enchantment::RARITY_UNCOMMON, Enchantment::SLOT_SWORD, Enchantment::SLOT_NONE, 3));



        $this->swordEnchantments = $this->getConfig()->get("swordEnchantments");

        $this->toolEnchantments = $this->getConfig()->get("toolEnchantments");

        $this->bowEnchantments = $this->getConfig()->get("bowEnchantments");

        $this->helmetEnchantments = $this->getConfig()->get("helmetEnchantments");

        $this->chesplateEnchantments = $this->getConfig()->get("chesplateEnchantments");

        $this->leggingEnchantments = $this->getConfig()->get("leggingEnchantments");

        $this->bootsEnchantments = $this->getConfig()->get("bootsEnchantments");

    }



    public function getBookshelfs(Block $ectable) : int {

        $count = 0;

        $level = $ectable->getLevel();

        // b stands for "base"

        $bx = $ectable->getX();

        $by = $ectable->getY();

        $bz = $ectable->getZ();

        // Right

        for($i = 0; $i <= 2; $i++) {

            for($ii = 0; $ii <= 2; $ii++) {

                if ($i === 0) {

                    if ($level->getBlockIdAt($bx, $by + $ii, $bz + 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                } else {

                    if ($level->getBlockIdAt($bx + $i, $by + $ii, $bz + 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                    if ($level->getBlockIdAt($bx - $i, $by + $ii, $bz + 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                }

            }

        }

        // Left

        for($i = 0; $i <= 2; $i++) {

            for($ii = 0; $ii <= 2; $ii++) {

                if ($i === 0) {

                    if ($level->getBlockIdAt($bx, $by + $ii, $bz - 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                } else {

                    if ($level->getBlockIdAt($bx + $i, $by + $ii, $bz - 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                    if ($level->getBlockIdAt($bx - $i, $by + $ii, $bz - 2) === Block::BOOKSHELF) {

                        $count++;

                    }

                }

            }

        }

        // Top

        for($i = 0; $i <= 1; $i++) {

            for($ii = 0; $ii <= 2; $ii++) {

                if ($i === 0) {

                    if ($level->getBlockIdAt($bx + 2, $by + $ii, $bz) === Block::BOOKSHELF) {

                        $count++;

                    }

                } else {

                    if ($level->getBlockIdAt($bx + 2, $by + $ii, $bz + $i) === Block::BOOKSHELF) {

                        $count++;

                    }

                    if ($level->getBlockIdAt($bx + 2, $by + $ii, $bz - $i) === Block::BOOKSHELF) {

                        $count++;

                    }

                }

            }

        }

        // Bottom

        for($i = 0; $i <= 1; $i++) {

            for($ii = 0; $ii <= 2; $ii++) {

                if ($i === 0) {

                    if ($level->getBlockIdAt($bx - 2, $by + $ii, $bz) === Block::BOOKSHELF) {

                        $count++;

                    }

                } else {

                    if ($level->getBlockIdAt($bx - 2, $by + $ii, $bz + $i) === Block::BOOKSHELF) {

                        $count++;

                    }

                    if ($level->getBlockIdAt($bx - 2, $by + $ii, $bz - $i) === Block::BOOKSHELF) {

                        $count++;

                    }

                }

            }

        }

        return $count;



    }

}
