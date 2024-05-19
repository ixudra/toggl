<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait UserTrait {

    /**
     * Get clients visible to user
     *
     * @return  stdClass
     */
    public function userClients()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/clients' );
    }

    /**
     * Get tags visible to user
     *
     * @return  stdClass
     */
    public function userTags()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/tags' );
    }

    /**
     * Get projects visible to user
     *
     * @return  stdClass
     */
    public function userTasks()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/tasks' );
    }

    /**
     * Get projects visible to user
     *
     * @return  stdClass
     */
    public function userWorkspaces()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/workspaces' );
    }
}
