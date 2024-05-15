<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait WorkspaceUsersTrait
{

    /**
     * Update user - only the admin flag can be changed.
     *
     * @param  integer $id   ID of the user
     * @param  array   $data Data payload that is to be sent with the request
     * @return stdClass
     */
    public function updateUser(int $id, array $data = [])
    {
        return $this->sendPostMessage($this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/workspace_users/'. $id, $data);
    }

    /**
     * Delete workspace user
     *
     * @param  integer $id ID of the user
     * @return stdClass
     */
    public function deleteUser(int $id)
    {
        return $this->sendDeleteMessage($this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/workspace_users/'. $id);
    }

    /**
     * Get workspace users
     *
     * @return stdClass
     */
    public function users()
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/users');
    }

}
