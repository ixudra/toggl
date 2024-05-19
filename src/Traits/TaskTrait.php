<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait TaskTrait {
    /**
     * Get project tasks
     *
     * @param   integer     $id         ID of the project
     * @return  stdClass
     */
    public function projectTasks(int $id)
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $id .'/tasks');
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTask(int $projectId, array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $projectId .'/tasks', $data );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the task
     * @return  stdClass
     */
    public function task(int $id, int $projectId)
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $projectId .'/tasks/'. $id );
    }

    /**
     * Update a task
     *
     * @param   integer     $id         ID of the task
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTask(int $id, int $projectId, array $data = array())
    {
        return $this->sendPutMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $projectId .'/tasks/'. $id, $data );
    }

    /**
     * Delete a task
     *
     * @param   integer     $id         ID of the task
     * @return  stdClass
     */
    public function deleteTask(int $id, int $projectId)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $projectId .'/tasks/'. $id );
    }

}
