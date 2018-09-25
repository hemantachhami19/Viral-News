<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\BaseRepo\BaseRepository;
use App\Repositories\Categories\Interfaces\CategoryRepoInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class CategoryRepository extends BaseRepository implements CategoryRepoInterface
{
    public $category;
    public function __construct(Category $category)
    {
        parent::__construct($$category);
        $this->model = $category;
    }

    /**
     * @param array $data
     *
     * @return Category
     * @throws CreateCategoryErrorException
     */
    public function createCategory(array $data) : Category
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreateCategoryErrorException($e);
        }
    }

    /**
     * @param int $id
     *
     * @return Category
     * @throws CategoryNotFoundErrorException
     */
    public function findCategoryById(int $id) : Category
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CategoryNotFoundErrorException($e);
        }
    }

    /**
     * @param array $data
     * @param int $id
     *
     * @return bool
     * @throws UpdateCategoryErrorException
     */
    public function updateCategory(array $data) : bool
    {
        try {
            return $this->update($data);
        } catch (QueryException $e) {
            throw new UpdateCategoryErrorException($e);
        }
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function deleteCategory() : bool
    {
        return $this->delete();
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return Collection
     */
    public function listCategories($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc') : Collection
    {
        return $this->all($columns, $orderBy, $sortBy);
    }


}