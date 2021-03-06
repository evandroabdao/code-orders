<?php
namespace CodeOrders\V1\Rest\Orders;

use CodeOrders\V1\Rest\Users\UsersRepository;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class OrdersResource extends AbstractResourceListener
{
	private $repository;
	
	private $service;

    private $usersRepository;
	
	public function __construct(OrdersRepository $repository, OrdersService $service, UsersRepository $usersRepository){
		$this->repository = $repository;
		$this->service = $service;
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
//        if($user->getRole()!='salesman'){
            //return new ApiProblem(405, "Only salesman can create orders.");
//        }
    	$result = $this->service->insert($data);
    	if($result=='error'){
    		return new ApiProblem(405, 'Error processing order');
    	}
        return $result;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
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
        $user = $this->usersRepository->findByUsername($this->getIdentity()->getRoleId());
        return $this->repository->findAll($user);
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
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
