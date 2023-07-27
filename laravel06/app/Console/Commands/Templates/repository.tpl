<?php
namespace Modules\{moduleName}\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\{moduleName}\src\Models\{moduleName};
use Modules\{moduleName}\src\Repositories\{moduleName}RepositoryInterface;

class {moduleName}Repository extends BaseRepository implements {moduleName}RepositoryInterface
{
    public function getModel()
    {
        return {moduleName}::class;
    }
}
