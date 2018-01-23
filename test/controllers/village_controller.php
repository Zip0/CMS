<?php

class VillageController {

    public function completeTurn() {
        $db = Db::getInstance();
        $village = Village::find($_GET['id']);
        $professions = $this->getProfessions($village);
        $deltaFood = $this->getDeltaFood($professions['farmers'], count($village->villagers));
        $deltaWood = $this->getDeltaWood($professions['woodcutters']);
        $deltaGold = $this->getDeltaGold(count($village->villagers));
        $db->completeTurn($village->id, $deltaFood, $deltaWood, $deltaGold);
    }

    public function edit() {
//        echo 'edit';exit;
        $this->checkId();
        $villager = Villager::find($_GET['id']);
        require_once('views/village/edit.php');
    }

    private function checkId() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
    }

    private function getProfessions($village) {
        $professions = array('farmers' => 0, 'woodcutters' => 0, 'commoners' => 0, 'workExempt' => 0);
        foreach ($village->villagers as $villager) {
            switch ($villager['type']) {
                case "farmer":
                    $professions['farmers'] += 1;
                    break;
                case "woodcutter":
                    $professions['woodcutters'] += 1;
                    break;
                case "commoner":
                    $professions['commoners'] += 1;
                    break;
                default:
                    $professions['workExempt'] += 1;
            }
        }
        return $professions;
    }

    private function getDeltaFood($farmers, $villagers) {
        return ((3 * $farmers) - $villagers);
    }

    private function getDeltaWood($woodcutters) {
        return (1 * $woodcutters);
    }

    private function getDeltaGold($villagers) {
        return ($villagers);
    }

}
