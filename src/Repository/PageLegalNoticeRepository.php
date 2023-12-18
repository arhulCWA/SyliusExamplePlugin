<?php

namespace Cwa\SyliusExamplePlugin\Repository;

use wa\SyliusExamplePlugin\Entity\Page\Static\PageLegalNotice;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * @extends ServiceEntityRepository<PageLegalNotice>
 *
 * @method PageLegalNotice|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageLegalNotice|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageLegalNotice[]    findAll()
 * @method PageLegalNotice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageLegalNoticeRepository extends EntityRepository
{
    public function findEnabledPageLegalNotice(): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.enabled = :enabled')
            ->setParameter('enabled', true)
            ->getQuery()
            ->getResult()
            ;
    }
}
