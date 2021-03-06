<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $display
 * @property int|null $counter
 * @property \Cake\I18n\FrozenTime|null $createad_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property \Cake\I18n\FrozenTime|null $finish_at
 *
 * @property \App\Model\Entity\Client[] $clients
 */
class Campaign extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'display' => true,
        'counter' => true,
        'createad_at' => true,
        'updated_at' => true,
        'finish_at' => true,
        'clients' => true,
    ];
}
