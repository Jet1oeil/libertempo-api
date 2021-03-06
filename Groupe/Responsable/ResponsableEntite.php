<?php declare(strict_types = 1);
namespace LibertAPI\Groupe\Responsable;

/**
 * @inheritDoc
 *
 * @author Prytoegrian <prytoegrian@protonmail.com>
 * @author Wouldsmina
 *
 * @since 1.1
 *
 * Ne devrait être contacté que par ResponsableRepository
 * Ne devrait contacter personne
 */
class ResponsableEntite extends \LibertAPI\Tools\Libraries\AEntite
{
    public function getGroupeId() : int
    {
        return (int) $this->getFreshData('groupeId');
    }

    public function getLogin()
    {
        return $this->getFreshData('login');
    }

    /**
     * @inheritDoc
     */
    public function populate(array $data)
    {
    }
}
