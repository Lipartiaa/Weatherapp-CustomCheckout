<?php declare(strict_types=1);

namespace Duvall\Blog\Model\ResourceModel\Post;

use Duvall\Blog\Model\ResourceModel\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Duvall\Blog\Model\Post::class, Post::class);
    }
}
