<?php

namespace Woda\FSBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FolderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FolderRepository extends EntityRepository
{

    /**
     * findByPath method
     * 
     * Returns folder by its path. Returns rootfolder if path's wrong.
     */
    public function findByPath($path, $user)
    {
        if ($user === null)
            return null;
        $path = explode('/', $path);
        $folder = $this->findOneBy(array('user' => $user, 'parent' => null));

        foreach ($path as $key => $fname) {
            if ($fname == '')
                break;
            $tmp = $this->findOneBy(array('user' => $user, 'parent' => $folder, 'name' => $fname));
            if ($tmp === null)
                return null;
            $folder = $tmp;
        }

        return $folder;
    }
}