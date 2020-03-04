<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\SalesChannel\Search;

use Shopware\Core\Content\Product\SalesChannel\ProductSearchRouteInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\Request;

/**
 * @deprecated tag:v6.3.0 use \Shopware\Core\Content\Product\SalesChannel\ProductSearchRoute instead
 */
class ProductSearchGateway implements ProductSearchGatewayInterface
{
    /**
     * @var ProductSearchRouteInterface
     */
    private $route;

    public function __construct(ProductSearchRouteInterface $route)
    {
        $this->route = $route;
    }

    public function search(Request $request, SalesChannelContext $context): EntitySearchResult
    {
        return $this->route->load($request, $context)->getListingResult();
    }
}
