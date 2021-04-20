<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait WorkspaceUsersTrait
{

    /**
     * Invite new users to workspace. Response has the following properties:
     *     data: array of created workspace user objects
     *     notifications: array of strings. If some emails did not pass the validation the error is described here.
     *
     * @param  array $data Array of emails to be invited
     * @return stdClass
     */
    public function inviteUsers(array $data = array())
    {
        $requestData = array(
            'emails'          => $data
        );

        return $this->sendPostMessage($this->baseUrl .'/api/v8/workspaces/' . $this->workspaceId . '/invite', $requestData);
    }

    /**
     * Update user - only the admin flag can be changed.
     *
     * @param  integer $id   ID of the user
     * @param  array   $data Data payload that is to be sent with the request
     * @return stdClass
     */
    public function updateUser($id, array $data = array())
    {
        $requestData = array(
            'workspace_user'          => $data
        );

        return $this->sendPostMessage($this->baseUrl .'/api/v8/workspace_users/'. $id, $requestData);
    }

    /**
     * Delete workspace user
     *
     * @param  integer $id ID of the user
     * @return stdClass
     */
    public function deleteUser($id, array $data = array())
    {
        $requestData = array(
            'task'          => $data
        );

        return $this->sendDeleteMessage($this->baseUrl .'/api/v8/workspace_users/'. $id);
    }

    /**
     * Get workspace users
     *
     * @return stdClass
     */
    public function users()
    {
        return $this->sendGetMessage($this->baseUrl .'/api/v8/workspaces/' . $this->workspaceId . '/workspace_users');
    }

}
