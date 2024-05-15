<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait ProjectTrait {

    /**
     * Get projects visible to user
     *
     * @return  stdClass
     */
    public function projects()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/projects' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createProject(array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects', $data );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the project
     * @return  stdClass
     */
    public function project(int $id)
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $id );
    }

    /**
     * Update a project
     *
     * @param   integer     $id         ID of the project
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateProject(int $id, array $data = [])
    {
        return $this->sendPutMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $id, $data );
    }

    /**
     * Delete a project
     *
     * @param   integer     $id         ID of the project
     * @return  stdClass
     */
    public function deleteProject(int $id)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/projects/'. $id );
    }

    /**
     * Get workspace projects users
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function projectUsers(array $data = [])
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/workspaces/'. $this->workspaceId .'/project_users', $data );
    }
}
