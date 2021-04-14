<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait WorkspaceTrait
{
    /**
     * Get workspace projects
     *
     * @return stdClass
     */
    public function workspaces()
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces');
    }
    
    /**
     * Get workspace clients
     *
     * @return stdClass
     */
    public function workspaceClients()
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces/' . $this->workspaceId . '/clients');
    }
    
    /**
     * Get workspace groups
     *
     * @return stdClass
     */
    public function workspaceGroups()
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces/' . $this->workspaceId . '/groups');
    }

    /**
     * Get workspace projects
     *
     * @return stdClass
     */
    public function workspaceProjects()
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces/' . $this->workspaceId . '/projects');
    }

    /**
     * Get workspace tasks
     *
     * @return stdClass
     */
    public function workspaceTasks($active = true)
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces/' . $this->workspaceId . '/tasks', [
            'active' => $active
        ]);
    }
    
    /**
     * Get workspace tags
     *
     * @return stdClass
     */
    public function workspaceTags()
    {
        return $this->sendGetMessage($this->baseUrl .'/v8/workspaces/' . $this->workspaceId . '/tags');
    }

}
