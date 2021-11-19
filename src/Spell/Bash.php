<?php
/** @author Demyan Seleznev <seleznev@intervolga.ru> */

namespace Demyanseleznev\Rpg\Spell;

use Demyanseleznev\Rpg\CharacterInterface;
use Demyanseleznev\Rpg\SpellInterface;

final class Bash implements SpellInterface
{
    public function affect(CharacterInterface $caster, CharacterInterface $target): void
    {
        if (!$this->canCast($caster, $target)) {
            return;
        }

        $damage = $caster->power() * 1.5; // formula
        $target->takeDamage($damage);
    }

    public function manacost(): int
    {
        return 50; // todo: formula
    }

    public function name(): string
    {
        return 'bash';
    }

    public function canCast(CharacterInterface $caster, CharacterInterface $target): bool
    {
        return $caster !== $target;
    }
}