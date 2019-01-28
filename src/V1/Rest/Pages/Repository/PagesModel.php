<?php

declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\Repository;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;

class PagesModel extends TableGateway
{
    /**
	 * @param $Id
	 * @return array|\ArrayObject|bool|null
	 */
    public function getById($Id)
    {
    	if( empty($Id) ){
    		return false;
    	}
    	return $this->select(array('Id' => $Id))->current();

    }
    
    /**
	 * @param $Name
	 * @return array|\ArrayObject|bool|null
	 */
    public function getByName($Name)
    {
    	if( empty($Name) ){
    		return false;
    	}
    	return $this->select(array('Name' => $Name))->current();

    }
    
    /**
	 * @param array $Where
	 * @return ResultSet
	 */
	public function fetchAll(array $where = array())
	{
		$select = new Select();
		$select->from($this->getTable());
		if( !empty($where['where']) ){
			$select->where($where['where']);
		}
		if( !empty($where['columns']) ){
			$select->columns($where['columns']);
		}
		
		$sql = new Sql($this->Adapter);
		$statement = $sql->prepareStatementForSqlObject($select);
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());

		return $resultSet;
	}
}