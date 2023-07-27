<?php
namespace Modules\Product\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Product\src\Models\Product;
use Modules\Product\src\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }
}
