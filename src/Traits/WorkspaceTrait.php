<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait WorkspaceTrait {

    /**
     * Get workspaces
     *
     * @return stdClass
     */
    public function workspaces()
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl . '/workspaces');
    }

    /**
     * Get workspace clients
     *
     * @return stdClass
     */
    public function workspaceClients()
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl . '/workspaces/' . $this->workspaceId . '/clients');
    }

    /**
     * Get workspace groups
     *
     * @return stdClass
     */
    public function workspaceGroups()
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl . '/workspaces/' . $this->workspaceId . '/groups');
    }

    /**
     * Get workspace projects
     *
     * @param   array       $data           Data payload that is to be sent with the request
     * @return stdClass
     */
    public function workspaceProjects(array $data = [])
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl . '/workspaces/' . $this->workspaceId . '/projects', $data);
    }

    /**
     * Get workspace tasks
     *
     * @param   boolean     $active         Status of the tasks
     * @return stdClass
     */
    public function workspaceTasks($active = true)
    {
        $data = [
            'active'    => $active,
        ];
        
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl . '/workspaces/' . $this->workspaceId . '/tasks', $data);
    }
}
