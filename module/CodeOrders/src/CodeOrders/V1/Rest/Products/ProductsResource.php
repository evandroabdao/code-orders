<?php
namespace CodeOrders\V1\Rest\Products;

use CodeOrders\V1\Rest\Users\UsersRepository;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProductsResource extends AbstractResourceListener
{
	protected $repository;

    protected $usersRepository;

	public function __construct(ProductsRepository $repository, UsersRepository $usersRepository){
		$this->repository = $repository;
		$this->usersRepository = $usersRepository;
	}
	
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $user = $this->usersRepository->findByUsername($this->getIdentity()->getRoleId());
        if($user->getRole()!='administrador'){
            return new ApiProblem(405, "Only administrator can create new products.");
        }
        return $this->repository->create($data);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $user = $this->usersRepository->findByUsername($this->getIdentity()->getRoleId());
        if($user->getRole()!='administrador'){
            return new ApiProblem(405, "Only administrator can delete products.");
        }
        return $this->repository->delete($id);
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return $this->repository->findAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $user = $this->usersRepository->findByUsername($this->getIdentity()->getRoleId());
        if($user->getRole()!='administrador'){
            return new ApiProblem(405, "Only administrator can update products.");
        }
        return $this->repository->update($id, $data);
    }
}
