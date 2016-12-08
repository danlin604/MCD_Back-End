<?php

class Supplies extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct();
	}
        
        function rules() {
            $config = [
                ['field'=>'id', 'label'=>'Stock code', 'rules'=> 'required|integer'],
                ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
                ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
                ['field'=>'receiving_unit', 'label'=>'Recieving unit', 'rules'=> 'required'],
                ['field'=>'receiving_cost', 'label'=>'Recieving cost', 'rules'=> 'required'],
                ['field'=>'stock_unit', 'label'=>'Stock unit', 'rules'=> 'required'],
                ['field'=>'receiving_unit', 'label'=>'Recieving unit', 'rules'=> 'required'],
                ['field'=>'quantities_on_hand', 'label'=>'Quantities on hand', 'rules'=> 'required']
            ];
            return $config;
        }

}