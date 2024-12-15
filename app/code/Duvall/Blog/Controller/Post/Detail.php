<?php declare(strict_types=1);

namespace Duvall\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Detail implements HttpGetActionInterface
{
    public function __construct(
        private PageFactory $pageFactory,
        private EventManager $eventManager,
        private RequestInterface $request,
    ) {}

    public function execute(): Page
    {
        $this->eventManager->dispatch('duvall_blog_post_detail_view', [
            'request' => $this->request,
        ]);

        return $this->pageFactory->create();
    }
}
