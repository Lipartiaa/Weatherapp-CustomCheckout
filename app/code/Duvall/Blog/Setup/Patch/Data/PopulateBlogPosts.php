<?php declare(strict_types=1);

namespace Duvall\Blog\Setup\Patch\Data;

use Duvall\Blog\Api\PostRepositoryInterface;
use Duvall\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class PopulateBlogPosts implements DataPatchInterface
{

    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory              $postFactory,
        private PostRepositoryInterface  $postRepository,
    )
    {
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $posts = [
            [
                'title' => 'Napoli Is Club',
                'content' => 'Kvaracxelia Cxelia',
            ],
            [
                'title' => 'AUDI is the Best Car',
                'content' => 'A7 IS GOAT OF THE CARS',
            ],
            [
                'title' => 'Miha Hamodi',
                'content' => 'HAMODI MIHA',
            ]
        ];

        foreach ($posts as $postData) {
            $post = $this->postFactory->create();
            $post->setData($postData);
            $this->postRepository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}
