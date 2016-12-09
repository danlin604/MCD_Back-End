<?php
/**
 * REST server for ferry schedule operations.
 * This one manages ports.
 *
 * ------------------------------------------------------------------------
 */
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';
class Maintenance extends Rest_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('supplies');
    }

    //---------------------------------------------------------------------
    // CRUD "read" support
    //---------------------------------------------------------------------
    // Handle an incoming GET ... return a menu item or all of them
    // URL format /maintenance OR /maintenance&id=x
    function index_get()
    {
        // check for item ID specified as query parameter or HTTP message property
        $key = $this->get('id');
        $this->crud_get($key);
    }

    // Handle an incoming GET ... return 1 or all menu item
    // URL format /maintenance/item OR /maintenance/item/x 
    //	OR /maintenance/item/id/x OR /maintenance/item?id=x
    function item_get($key = null)
    {
        // item ID specified as segment, query parameter or HTTP message property
        if (($key == null) || ($key == 'id'))
                $key = $this->get('id');

        $this->crud_get($key);
    }

    // cRRRud - retrieve one identified item or all of them
    private function crud_get($key = null)
    {
            // no item requested; return them all
            if (!$key)
            {
                $this->response($this->supplies->all(), 200);
                return;
            }

            // find & return a specific item
            $result = $this->supplies->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Read: Supplies item ' . $key . ' not found!'), 404);
    }

    //---------------------------------------------------------------------
    // CRUD "create" support
    //---------------------------------------------------------------------
    // Handle an incoming POST - add a new menu item, ID in payload
    function index_post()
    {
        $this->crud_post($this->post());
    }

    // Handle an incoming POST - add a new menu item - ID in URL
    function item_post($key = null)
    {
        // decode record before anything, as assoc array
        $record = json_decode($this->post(),true);

        // item ID specified as segment or query parameter
        if (($key == null) || ($key == 'id'))
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $record);
        } 

        $this->crud_post($record);
    }

    // CCCrud - create a new item in our table
    private function crud_post($record = null)
    {
            $key = $record['id'];

            // Make sure the new record has an ID
            if (!isset($key))
            {
                $this->response(array('error' => 'Create: No item specified'), 406);
                return;
            }

            // make sure the item isn't already there
            if ($this->supplies->exists($key))
            {
                $this->response(array('error' => 'Create: Item ' . $key . ' already exists'), 406);
                return;
            }

            // proceed with add
            $this->supplies->add($record);

            // check for DB errors
            $oops = $this->db->error();
            if (empty($oops['code']))
                    $this->response(array('ok'), 200);
            else
                    $this->response($oops, 400);
    }

    //---------------------------------------------------------------------
    // CRUD "update" support
    //---------------------------------------------------------------------
    // Handle an incoming PUT - update a new menu item, ID in payload
    function index_put()
    {
            $this->crud_put($this->put());
    }

    // Handle an incoming PUT - update a new menu item - ID in URL
    function item_put($key = null)
    {
        var_dump($this -> put());
        die();
        $incoming = key($this->put());

        // decode record before anything, as assoc array
        $record = json_decode($incoming,true);

        // item ID specified as segment or query parameter
        if (($key == null) || ($key == 'id'))
        {
                $key = $this->get('id');
                $record = array_merge(array('id' => $key), $record);
        }
        $this->crud_put($record);
    }

    // crUUUd - update an item in our table
    private function crud_put($record = null)
    {
        $key = $record['id'];

        // Make sure the new record has an ID
        if (!isset($key))
        {
            $this->response(array('error' => 'Update: No item specified'), 406);
            return;
        }

        // make sure the item is real
        if (!$this->supplies->exists($key))
        {
            $this->response(array('error' => 'Update: Item ' . $key . ' not found'), 406);
            return;
        }

        // proceed with update
        $this->supplies->update($record);

        // check for DB errors
        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }

    //---------------------------------------------------------------------
    // CRUD "delete" support
    //---------------------------------------------------------------------
    // Handle an incoming DELETE - delete a new menu item, ID in payload
    function index_delete()
    {
        $this->crud_delete($this->delete());
    }

    // Handle an incoming DELETE - delete a new menu item - ID in URL
    function item_delete($key = null)
    {
        // item ID specified as segment or query parameter

        if (($key == null) || ($key == 'id'))
        {
            $key = $this->get('id');
        }
        $this->crud_delete($key);
    }

    // cruDDD - delete an item in our table
    private function crud_delete($key = null)
    {
        // Make sure the new record has an ID
        if (!isset($key))
        {
                $this->response(array('error' => 'Delete: No item specified'), 406);
                return;
        }

        // make sure the item is real
        if (!$this->supplies->exists($key))
        {
                $this->response(array('error' => 'Delete: Item ' . $key . ' not found'), 406);
                return;
        }

        // proceed with delete
        $this->supplies->delete($key);
                $this->response(array('error' => $this->db->error(),
                        'test'=>'testing'), 500);
                return;

        // check for DB errors
        $oops = $this->db->error();
        if (empty($oops['code']))
                $this->response(array('ok'), 200);
        else
                $this->response($oops, 400);
    }

    //---------------------------------------------------------------------
    // Our model API support
    //---------------------------------------------------------------------
    // return validation rules for front-end to use
    function rules_get()
    {
        $this->response($this->supplies->rules(), 200);
    }

    // return an empty record, with properties per table metadata
    function create_get()
    {
        return $this->response($this->supplies->create(), 200);
    }	
}