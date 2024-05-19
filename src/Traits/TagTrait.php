<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait TagTrait {

    /**
     * Get workspace tags
     *
     * @return  stdClass
     */
    public function tags()
    {
        return $this->sendGetMessage($this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/tags');
    }

    /**
     * Create workspace tags.
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTag(array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/tags', $data);
    }

    /**
     * Update a tag
     *
     * @param   integer     $id         ID of the tag
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTag(int $id, array $data = array())
    {
        return $this->sendPutMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/tags/'. $id, $data);
    }

    /**
     * Delete a tag
     *
     * @param   integer     $id         ID of the tag
     * @return  stdClass
     */
    public function deleteTag(int $id)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/tags/'. $id );
    }

}
