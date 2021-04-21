<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait TagTrait {

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTag(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'tag'       => $data
        );

        return $this->sendPostMessage( $this->baseUrl .'/api/v8/tags', $requestData );
    }

    /**
     * Update a tag
     *
     * @param   integer     $id         ID of the tag
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTag($id, array $data = array())
    {
        $requestData = array(
            'tag'       => $data
        );

        return $this->sendPutMessage( $this->baseUrl .'/api/v8/tags/'. $id, $requestData );
    }

    /**
     * Delete a tag
     *
     * @param   integer     $id         ID of the tag
     * @return  stdClass
     */
    public function deleteTag($id)
    {
        return $this->sendDeleteMessage( $this->baseUrl .'/api/v8/tags/'. $id );
    }

}
